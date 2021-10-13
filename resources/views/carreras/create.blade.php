@extends('adminlte::page')

@section('title', 'Nueva Carrera')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>Agregar Carrera</h1>
       
    </div>
</div>
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hay algunos problemas en el formulario de creación.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--Inicio de formulario--}} 
<form action="{{ route('carreras.store') }}" method="POST">
    @csrf
  
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 border rounded py-3 px-2">
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Clave*:</strong>
                    <input type="text" name="clave" class="form-control" placeholder="Ingrese la clave de la carrera" maxlength="20">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <strong>Nombre*:</strong>
                    <input class="form-control" name="nombre" placeholder="Ingrese el nombre de la carrera" maxlength="200"></textarea>
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