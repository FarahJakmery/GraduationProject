<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $roles = $user->getRoleNames()->first();
        return view('professor.profile.show', ['user' => $user, 'roles' => $roles]);
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
        $roles = $user->getRoleNames()->first();
        return view('professor.profile.edit', ['user' => $user, 'roles' => $roles]);
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
            'description'         => 'required|string|min:30',
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


        $professor = new Professor();
        $professor->update([
            'description'     => $request->description,
            'user_id'         => Auth::id(),
        ]);

        if ($user and $professor)
            request()->session()->flash('success', 'Your Information Updated Successfully.');
        else
            request()->session()->flash('danger', 'Something Went Wrong.');

        return redirect()->route('profprofile.show', $id);
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
