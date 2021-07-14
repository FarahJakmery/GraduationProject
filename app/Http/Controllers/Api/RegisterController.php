<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\user;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'full_name'           => 'required|string|max:255',
            'phone'               => 'required|string|min:10|max:25',
            'email'               => 'required|string|email|unique:users|max:255',
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

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'    => $user,
            'token'   => $token,
            'student' => $student,

        ];
        return response($response, 201);
    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
