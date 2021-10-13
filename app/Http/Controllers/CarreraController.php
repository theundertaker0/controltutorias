<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use DataTables;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('carreras.index');
    }


    public function getCarreras(){
        $carreras = Carrera::all();
        return Datatables::of($carreras)
        ->addIndexColumn()
        ->editColumn('created_at',function($row){
            return date('d/m/Y', strtotime($row->created_at) );
        })
        ->editColumn('updated_at',function($row){
            return date('d/m/Y', strtotime($row->updated_at) );
        })
        ->addColumn('acciones', function($row){
            $actionBtn = '<form action="carreras/'.$row->id.'" method="POST">'.
            '<a href="carreras/'.$row->id.'/edit" class="edit btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>'.
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
        return view('carreras.create');
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

        Carrera::create($request->all());

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
        return view('carreras.show', compact(['carrera'=>$carrera]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $request->validate([
            'clave' => 'required',
            'nombre' => 'required',
        ]);
        $carrera->update($request->all());

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera actualizada exitósamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
        $carrera->delete();

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera eliminada exitósamente');
    }
}
