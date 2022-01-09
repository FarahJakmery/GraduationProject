<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentNumber;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Year;
// use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{
    use HasRoles;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $role = Role::first();
        $years = Year::all();
        return view('auth.register', ['years' => $years, 'role' => $role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'           => 'required|string|max:255',
            'phone'               => 'required|string|min:10|max:25',
            'email'               => 'required|string|email|max:255|unique:users',
            'password'            => 'required|string|confirmed|min:8',
            'photo'               => 'required|file|image',
            'role_id'             => 'required|exists:roles,id',
            'year_id'             => 'required|exists:years,id',
            'number_id'           => 'required|exists:student_numbers,student_number',
        ]);

        if (StudentNumber::where('student_number', $request->number_id)->exists()) {
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
                'number_id'   => $request->number_id,
            ]);

            $role = Role::find($request->role_id);

            $user->assignRole($role);

            $user_id = Auth::id();

            if ($role == (Role::findByName('Student'))) {
                return redirect()->route('years.index');
            }
            event(new Registered($user));

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
