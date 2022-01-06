<div class="form-group">
    <label for="codigo">Código</label>
    {!! Form::text('codigo', null, ['class'=>'form-control','placeholder'=>'Ingrese código','onblur'=>'this.value=this.value.toUpperCase();']) !!}
    @error('codigo')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="nombre">Nombre</label>
    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese nombre','onblur'=>'this.value=this.value.toUpperCase();']) !!}
    @error('nombre')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="direccion">Dirección</label>
    {!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Ingrese dirección','onblur'=>'this.value=this.value.toUpperCase();']) !!}
    @error('direccion')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="telefono">Teléfono</label>
    {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'=>'Ingrese teléfono','onblur'=>'this.value=this.value.toUpperCase();']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="estado">Estado</label>
    {!! Form::select('estado',$estados,null,['class'=>'form-control']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>