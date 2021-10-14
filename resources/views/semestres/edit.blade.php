@extends('adminlte::page')

@section('title', 'Editar Semestre')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>Editar Semestre</h1>
       
    </div>
</div>
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hay algunos problemas en el formulario de edición.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--Inicio de formulario--}} 
<form action="{{ route('semestres.update',$semestre->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 border rounded py-3 px-2">
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Clave*:</strong>
                    <input type="text" name="clave" class="form-control" placeholder="Ingrese la clave del semestre" maxlength="20" value="{{$semestre->clave}}">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Nombre*:</strong>
                    <input class="form-control" name="nombre" placeholder="Ingrese el nombre del semestre" maxlength="200" value="{{$semestre->nombre}}"></textarea>
                </div>
            </div>
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
         </div>
        
        
    </div>
   
</form>
@stop

@section('css')
   
@stop

@section('js')

@stop