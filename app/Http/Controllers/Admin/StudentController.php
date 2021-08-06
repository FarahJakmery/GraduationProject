<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $years = Year::all();
        return view('admin.students.create', ['years' => $years, 'roles' => $roles]);
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
            'year_id'              => 'required|exists:years,id',
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

        $student = Student::create([
            'year_id'     => $request->year_id,
            'user_id'     => $user->id,
        ]);

        if ($user and $student) {
            request()->session()->flash('success', 'Student was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $role = Role::first();
        return view('admin.students.show', ['student' => $student, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $roles = Role::all();
        $years = Year::all();
        return view('admin.students.edit', ['years' => $years, 'roles' => $roles, 'student' => $student]);
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
            'year_id'              => 'required|exists:years,id',
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

        $student = new Student();
        $student->update([
            'year_id'     => $request->year_id,
            'user_id'     => $user->id,
        ]);

        if ($user and $student) {
            request()->session()->flash('success', 'Student was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('students.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);

        request()->session()->flash('danger', 'student Was Deleted Successfully.');

        return redirect()->route('students.index');
    }
}
