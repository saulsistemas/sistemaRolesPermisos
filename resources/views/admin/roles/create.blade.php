@extends('adminlte::page')

@section('title', 'Permiso')

@section('content_header')
    <h1>Crear de Permiso</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Crear</h3>
        <div class="card-tools">
            <a href="{{ route('home') }}" class="btn btn-tool" >
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
        {!! Form::open(['route'=>'roles.store']) !!}
                @include('admin.roles.partials.form')
            {!! Form::submit('Agregar', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop