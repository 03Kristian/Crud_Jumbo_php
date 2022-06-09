<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers= Teacher::simplePaginate(5);
        return view('Teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teachers= new Teacher();

        $teachers->nombres = $request->nombres;
        $teachers->apellidos = $request->apellidos;
        $teachers->direccion = $request->direccion;
        $teachers->correo  = $request->correo;
        $teachers->celular = $request->celular;
        $teachers->nivel_academico = $request->nivel_academico;
        $teachers->save();
        // return "Nuevo usuario creado!!";
        return redirect()->route('teachers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    // public function edit(Teacher $id)
    public function edit($id)
    {
        $teacher= Teacher::find($id);
        return view('Teacher/edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $id)
    {
        $teachers= Teacher::findOrfail($id);
        
        $teachers->nombres = $request->nombres;
        $teachers->apellidos = $request->apellidos;
        $teachers->direccion = $request->direccion;
        $teachers->correo  = $request->correo;
        $teachers->celular = $request->celular;
        $teachers->nivel_academico = $request->nivel_academico;
        $teachers->save();
        // return "Nuevo usuario creado!!";
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
       // Teacher::find($id)->delete();
        // // return redirect()->route('teachers.index',compact('teacher'));
        // return back();
}
