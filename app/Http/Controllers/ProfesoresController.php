<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use illuminate\View\View;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $profesores = Profesores::paginate(5);
        return view ('profesores.index',['profesores'=>$profesores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'correo'=>'required|email|unique:profesores,correo'
        ]);
        Profesores::create($request->all());
        return redirect()->route('profesores.index')->with('success', 'Nuevo profesor agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesores $profesores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesores $profesor): View
    {
        return view('profesores.edit', ['profesor' => $profesor]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesores $profesor):RedirectResponse
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'correo'=>'required|email'
        ]);
        $profesor->update($request->all());
        return redirect()->route('profesores.index')->with('success','Profesor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesores $profesor):RedirectResponse
    {
        $profesor->delete();
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado correctamente');
    }
}
