<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'           => 'required|string|max:255',
            'phone'               => 'required|string|min:10|max:25',
            'email'               => 'required|string|email|max:255|unique:users',
            'password'            => 'required|string|confirmed|min:8',
            'photo'               => ' required|file|image',
            'role_id'             => 'required|exists:roles,id',
            'year_id'             => 'required|exists:years,id',
        ]);

        $file = $request->file('photo');
        $file = $file->store('profile-pictures', 'public');
        Auth::login(
            $user = User::create([
                'full_name' => $request->full_name,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'photo'     => Storage::url($file),
            ])
        );
        $student = Student::create([
            'year_id'     => $request->year_id,
            'user_id'     => Auth::id(),
        ]);

        $role = Role::find($request->role_id);

        $user->assignRole($role);
        // $user_id = Auth::id();
        return response()->json(['user' => $user, 'student' => $student]);

        // if ($role == (Role::findByName('Student'))) {
        //     return redirect()->route('years.index');
        // }
        // event(new Registered($user));

        // return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
