@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar de Dashboard</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Editar</h3>
        <div class="card-tools">
            <a href="{{ route('categorias.update',$categoria) }}" class="btn btn-tool" >
                <i class="fas fa-sync-alt"></i>
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="maximize">
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <div class="card-body">
        <form action="{{ route('categorias.update',$categoria) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="">Código</label>
                <input type="text" name="codigo" value="{{$categoria->codigo}}" class="form-control">
            </div>
            <div>
                <label for="">nombre</label>
                <input type="text" name="nombre" value="{{$categoria->nombre}}" class="form-control">
            </div>
            <div>
                <input type="submit" value="Enviar" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop