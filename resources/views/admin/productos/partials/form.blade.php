<div class="form-group has-success">
    <label for="categoria_id">Categoría</label>
    {!! Form::select('categoria_id',$categorias,null,['class'=>'form-control']) !!}
    @error('categoria_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
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
    <label for="precio">Precio</label>
    {!! Form::number('precio', null,['class'=>'form-control']) !!}
    @error('precio')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="stock">Stock</label>
    {!! Form::number('stock', null, ['class'=>'form-control']) !!}
    @error('stock')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <div class="img-wrapper">
        @isset ($producto->imagen)
            {{-- <img id="picture" src="{{Storage::url($producto->imagen)}}" alt="" width="100px" height="100px"> --}}
            <img id="picture" src="{{ asset($producto->imagen)}}" width="100px" height="100px">
        @else
            <img id="picture" width="100px" height="100px" src="https://cdn.pixabay.com/photo/2021/11/08/14/17/europe-6779227_960_720.jpg" alt="">
        @endisset
    </div>    
    <label for="imagen">Imagen</label>
    {!! Form::file('imagen',['class'=>'form-control-file','accept'=>'image/*']) !!}
    @error('imagen')
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