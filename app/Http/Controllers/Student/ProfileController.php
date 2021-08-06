<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = Role::first();
        return view('student.profile.show', ['user' => $user, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::first();
        $years = Year::all();
        return view('student.profile.edit', ['user' => $user, 'years' => $years, 'role' => $role]);
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
            'full_name'           => 'required|string|max:255',
            'phone'               => 'required|string|min:10|max:25',
            'email'               => 'required|string|email|max:255', Rule::unique('users')->ignore(Auth::user()->id),
            'password'            => 'required|string|min:8',
            'photo'               => 'required|file|image',
            'role_id'             => 'required|exists:roles,id',
            'year_id'             => 'required|exists:years,id',
        ]);


        $file = $request->file('photo');
        $file = $file->store('profile-pictures', 'public');

        $user = User::find($id);
        $user->update([
            'full_name' => $request->full_name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'photo'     => Storage::url($file),
        ]);

        $student = new Student();
        $student->update([
            'year_id'     => $request->year_id,
            'user_id'     => Auth::id(),
        ]);

        if ($user and $student)
            request()->session()->flash('success', 'Your Information Updated Successfully.');
        else
            request()->session()->flash('danger', 'Something Went Wrong.');

        return redirect()->route('profile.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
