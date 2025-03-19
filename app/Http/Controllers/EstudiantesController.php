<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use illuminate\View\View;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $estudiantes = Estudiantes::paginate(5);
        return view('estudiantes.index',['estudiantes'=>$estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'nombre'=> 'required',
            'apellido'=>'required',
            'correo'=>'required|email|unique:estudiantes,correo',
            'fecha_nacimiento'=>'required'   
        ]);
        Estudiantes::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Nuevo estudiante agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiante):View
    {
        return view('estudiantes.edit',['estudiante'=>$estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiante):RedirectResponse
    {
        $request->validate([
            'nombre'=> 'required',
            'apellido'=>'required',
            'correo'=>'required|email|',
            'fecha_nacimiento'=>'required'   
        ]);
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiante):RedirectResponse
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }
}
