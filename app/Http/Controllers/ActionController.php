<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Action::all();
        return view('index', ['header' => "Acciones"], compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('action.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'interval' => 'required',
            'user_id' => 'required'
        ]);
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
        return view('action.edit', ['action' => Action::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'interval' => 'required',
            'user_id' => 'required'
        ]);

        Action::find($id)->update([
            'description' => $request->description,
            'date' => $request->date,
            'interval' => $request->interval,
            'user_id' => $request->user_id
        ]);

        return redirect(route('action.show', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Action::destroy($id);
        route('action.index');
    }
}
