<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Image;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();
        return view('admin.professors.index', ['professors' => $professors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.professors.create', ['roles' => $roles]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'full_name'                 => 'required|string|min:4|max:255',
            'photo'                     => 'required|file|image',
            'email'                     => 'required|string|email|max:255|unique:users',
            'password'                  => 'required|string|min:8',
            'phone'                     => 'required|string|min:10|max:25',
            'scientific_grade'          => 'required|string|min:4',
            'scientific_certificate'    => 'required|string|min:4',
            'role_id'                   => 'required|exists:roles,id',
        ]);

        $file = $request->file('photo');
        $file = $file->store('profile-pictures', 'public');

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->phone     = $request->phone;
        $user->photo     = Storage::url($file);
        $user->save();

        $role = Role::find($request->role_id);
        $user->assignRole($role);

        $professor = Professor::create([
            'scientific_grade'           => $request->scientific_grade,
            'scientific_certificate'     => $request->scientific_certificate,
            'user_id'                    => $user->id,
        ]);

        if ($user and $professor) {
            request()->session()->flash('success', 'professor was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('professors.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professor::find($id);
        $roles = $professor->user->getRoleNames()->first();
        return view('admin.professors.show', ['professor' => $professor, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $professor = Professor::find($id);
        $roles = Role::all();
        return view('admin.professors.edit', ['roles' => $roles, 'professor' => $professor]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professor = Professor::find($id);
        $request->validate([
            'full_name'                 => 'required|string|min:4|max:255',
            'photo'                     => 'required|file|image',
            'email'                     => 'required|string|email|max:255', Rule::unique('users')->ignore($professor->id),
            'password'                  => 'required|string|min:8',
            'phone'                     => 'required|string|min:10|max:25',
            'scientific_grade'          => 'required|string|min:4',
            'scientific_certificate'    => 'required|string|min:4',
            'role_id'                   => 'required|exists:roles,id',
        ]);

        $file = $request->file('photo');
        $file = $file->store('profile-pictures', 'public');


        $professor->update([
            'scientific_grade'           => $request->scientific_grade,
            'scientific_certificate'     => $request->scientific_certificate,
            'user_id'                    => $professor->user->id,
        ]);

        $user = User::find($professor->user->id);
        $user->update([
            'full_name' => $request->full_name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'photo'     => Storage::url($file),
        ]);

        $role = Role::find($request->role_id);
        $user->assignRole($role);

        if ($user and $professor) {
            request()->session()->flash('success', 'professor was updated successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('professors.index');
    }

    public function destroy($id)
    {
        $professor = Professor::destroy($id);

        request()->session()->flash('danger', 'professor Was Deleted Successfully.');

        return redirect()->route('professors.index');
    }
}
