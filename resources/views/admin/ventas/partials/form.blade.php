<div class="form-group">
    <label for="fecha">Fecha</label>
    {!! Form::date('fecha_venta', \Carbon\Carbon::now(), ['class'=>'form-control','placeholder'=>'Ingrese código','onblur'=>'this.value=this.value.toUpperCase();']) !!}
    @error('fecha_venta')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="igv">Impuesto</label>
    {!! Form::number('igv', null,['class'=>'form-control']) !!}
    @error('igv')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="cliente_id">Cliente</label>
    {!! Form::select('cliente_id',$clientes,null,['class'=>'form-control']) !!}
    @error('cliente_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>




