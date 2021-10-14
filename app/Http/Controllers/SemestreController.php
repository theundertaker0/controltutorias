<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;
use DataTables;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('semestres.index');
    }


    public function getSemestres(){
        $semestres = Semestre::all();
        return Datatables::of($semestres)
        ->addIndexColumn()
        ->editColumn('created_at',function($row){
            return date('d/m/Y', strtotime($row->created_at) );
        })
        ->editColumn('updated_at',function($row){
            return date('d/m/Y', strtotime($row->updated_at) );
        })
        ->addColumn('acciones', function($row){
            $actionBtn = '<form action="semestres/'.$row->id.'" method="POST">'.
            '<a href="semestres/'.$row->id.'/edit" class="edit btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>'.
            '<input type="hidden" name="_token" value="'.csrf_token().'" />'.
            '<input type="hidden" name="_method" value="DELETE">'.      
            '<button type="submit" class=" delete btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>';
            return $actionBtn;
        })
        ->rawColumns(['acciones'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('semestres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required',
        ]);

        Semestre::create($request->all());

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semestre  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        //
        return view('semestres.show', compact('semestre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semestre  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Semestre $semestre)
    {
        //
        return view('semestres.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semestre  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        //
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required',
        ]);
        $semestre->update($request->all());

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre actualizado exitósamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semestre  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        //
        $semestre->delete();

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre eliminado exitósamente');
    }
}
