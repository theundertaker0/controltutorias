@extends('adminlte::page')

@section('title', 'Carreras')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>Listado de Carreras</h1>
        <a class="btn btn-success" href="{{route('carreras.create')}}" title="Nueva carrera"> <i class="fas fa-plus-circle"></i>
        </a>
    </div>
</div>

@stop

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success" id="alerta">
            <p>{{$message}}</p>
        </div>
@endif
<div class="row mt-4">
    <div class="col-12 text-center">
        <table id="dtCarreras" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
    </div>
</div>
    
@stop

@section('css')
   
@stop

@section('js')
<script>
    $(document).ready( function () {
        $("#alerta").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});

      $('#dtCarreras').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
        processing: true,
        serverSide: true,
        ajax: "{{ url('getcarreras') }}",
        columns: [
          { data: 'id', name: 'id' },
          { data: 'clave', name: 'clave' },
          { data: 'nombre', name: 'nombre' },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
          {
                data: 'acciones', 
                name: 'acciones', 
                orderable: false, 
                searchable: false
            },
        ]
      });
    });
  </script>
@stop