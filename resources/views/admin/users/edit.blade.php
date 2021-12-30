@extends('adminlte::page')

@section('title', 'Asignar Rol')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Listado</h3>
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
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div>
            <label for="">nombre</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        <h2>Listado de Roles</h2>
        <div>
            {!! Form::model($user, ['route' => ['users.update', $user], 'method'=>'put']) !!}
                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>"mr-1"]) !!}
                        {{$role->name}}
                    </label>
                </div>                    
                @endforeach
                {!! Form::submit('Enviar', ['class'=>"btn btn-primary mt-2"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop