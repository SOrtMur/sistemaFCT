<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('index', ['header' => "Usuarios"], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $users = User::all();
        $tutores = [];
        $profesores = [];
        $roles = Role::all();
        $companies = Company::all();
        foreach ($users as $user) {
            if ($user->role()->where('name','tutor')->first()) {
                array_push($tutores, $user);
            }
            if ($user->role()->where('name','teacher')->first()) {
                array_push($profesores,$user);
            }
        }

        return view('create', ['header' => "Nuevo Usuario", 'tutores' => $tutores, 'profesores' => $profesores, 'roles' => $roles, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'surname1' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'surname1' => $request->surname1,
            'surname2' => $request->surname2,
            'remember_token' => Str::random(10),
            'tutor_id' => $request->tutor_id,
            'teacher_id' => $request->teacher_id,
        ]);

        $user->role()->attach($request->role_id);
        $user->company()->attach($request->company_id);
        $user->save();


        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('show', ['header' => "$user->name $user->surname1", 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $users = User::all();
        $tutores = [];
        $profesores = [];
        $roles = Role::all();
        $companies = Company::all();
        foreach ($users as $user) {
            if ($user->role()->where('name','tutor')->first()) {
                array_push($tutores, $user);
            }
            if ($user->role()->where('name','teacher')->first()) {
                array_push($profesores,$user);
            }
        }

        return view('edit', ['header' => "Editar datos de $user->name $user->surname1", 'user' => $user, 'tutores' => $tutores, 'profesores' => $profesores, 'roles' => $roles, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'surname1' => 'required'
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'surname1' => $request->surname1,
            'remember_token' => Str::random(10),
            'tutor_id' => $request->tutor_id,
            'teacher_id' => $request->teacher_id
        ]);

        $user = User::find($id);

        $user->company()->detach();
        $user->company()->attach($request->company_id);
        $user->role()->attach($request->role_id);
        $user->save();

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect(route('user.index'));
    }
}
