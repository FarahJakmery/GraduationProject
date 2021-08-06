<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
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
            'full_name'            => 'required|string|min:4|max:255',
            'photo'                => 'required|file|image',
            'email'                => 'required|string|email|max:255|unique:users',
            'password'             => 'required|string|min:8',
            'phone'                => 'required|string|min:10|max:25',
            'description'          => 'required|string|min:4',
            'role_id'              => 'required|exists:roles,id',
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
            'description'     => $request->description,
            'user_id'         => $user->id,
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
        $request->validate([
            'full_name'            => 'required|string|min:4|max:255',
            'photo'                => 'required|file|image',
            'email'                => 'required|string|email|max:255|unique:users',
            'password'             => 'required|string|min:8',
            'phone'                => 'required|string|min:10|max:25',
            'description'          => 'required|string|min:4',
            'role_id'              => 'required|exists:roles,id',
        ]);
        $user = new User();
        $user->full_name = $request->full_name;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->phone     = $request->phone;

        $file = $request->file('photo');
        $url = '/storage/photo' . $request->id . '.' . $file->extension();

        Image::make($file)
            ->resize(300, 250)
            ->save(public_path($url));
        $user->photo = $url;
        $user->save();

        $role = Role::find($request->role_id);
        $user->assignRole($role);

        $professor = Professor::create([
            'description'     => $request->description,
            'user_id'         =>  $user->id,
        ]);
        if ($user and $professor) {
            request()->session()->flash('success', 'professor was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('professors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professor::destroy($id);

        request()->session()->flash('danger', 'professor Was Deleted Successfully.');

        return redirect()->route('professors.index');
    }
}
