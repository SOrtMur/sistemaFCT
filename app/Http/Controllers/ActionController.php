<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\User;


class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = [];
        if(auth()->user()->hasRole('tutor')){
            $users = User::all();
            $pupils = [];
            foreach ($users as $user) {
                if ($user->role()->where('name','pupil')->first()) {
                    array_push($pupils, $user);
                }
            }
            foreach ($pupils as $pupil) {
                if($pupil->tutor_id == auth()->user()->id){
                    foreach ($pupil->actions()->get() as $action) {
                        array_push($actions, $action);
                    }
                }
            }
        }
        if(auth()->user()->hasRole('teacher')){
            $users = User::all();
            $pupils = [];
            foreach ($users as $user) {
                if ($user->role()->where('name','pupil')->first()) {
                    array_push($pupils, $user);
                }
            }
            foreach ($pupils as $pupil) {
                if($pupil->teacher_id == auth()->user()->id){
                    foreach ($pupil->actions()->get() as $action) {
                        array_push($actions, $action);
                    }
                }

            }
        }
        if(auth()->user()->hasRole('pupil')){
            $actions = auth()->user()->actions()->get();
        }
        return view('index', ['header' => "Acciones"], compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('tutor|admin')) {
            return redirect()->route('action.index');
        }
        return view('create', ['header' => "Nueva Acción"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('tutor|admin')) {
            return redirect()->route('action.index');
        }

        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'interval' => 'required',
            //'user_id' => 'required' Recoger el id del usuario logueado
        ]);

        Action::create([
            'description' => $request->description,
            'date' => $request->date,
            'interval' => $request->interval,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('action.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $accion = Action::find($id);
        return view('show', ['header' => "Acción $accion->id", 'action' => $accion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->hasRole('tutor|admin')) {
            return redirect()->route('action.index');
        }
        $accion = Action::find($id);
        return view('edit', ['header' => "Editar accion",'action' => $accion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasRole('tutor|admin')) {
            return redirect()->route('action.index');
        }
        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'interval' => 'required',
        ]);

        Action::find($id)->update([
            'description' => $request->description,
            'date' => $request->date,
            'interval' => $request->interval,
        ]);

        return redirect(route('action.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasRole('tutor|admin')) {
            return redirect()->route('action.index');
        }
        
        Action::destroy($id);
        return redirect(route('action.index'));
    }
}
