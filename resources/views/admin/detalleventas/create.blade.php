@extends('adminlte::page')

@section('title', 'venta')

@section('content_header')
    <h1>Crear de Detalle Venta</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Crear</h3>
        <div class="card-tools">
            <a href="{{ route('ventas.create') }}" class="btn btn-tool" >
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
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" value="{{$venta->fecha_venta}}" name="" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="igv">Impuesto</label>
                    <input type="text" value="{{$venta->igv}}" name="" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <input type="text" value="{{$venta->cliente->codigo. '= ' .$venta->cliente->nombre}}" name="" id="" class="form-control" readonly>
                </div>
            </div>
        </div>        
        {!! Form::open(['route'=> 'detalleventas.store','autocomplete'=>'off']) !!}
        <input type="hidden" value="{{ $venta->id }}" name="venta_id">
            @include('admin.detalleventas.partials.form')
        {!! Form::close() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive col-md-12">
                    <table id="detalles" class="table">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Item</th>
                                <th>Producto</th>
                                <th>Precio Venta (PEN)</th>
                                <th>Cantidad</th>
                                <th>SubTotal (PEN)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total= 0;
                            $num= 0;
                            @endphp
                            @foreach ($detalleVentas as $detalleventa)
                                <tr>
                                    <td>
                                        <form action="{{ route('detalleventas.destroy', $detalleventa-) }}" method="POST" class="formulario-eliminar">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td>{{$num+=1}}</td>
                                    <td>{{$detalleventa->producto->nombre}}</td>
                                    <td>{{$detalleventa->precio}}</td>
                                    <td>{{$detalleventa->cantidad}}</td>
                                    <td>{{$detalleventa->total}}</td>
                                </tr>
                                @php
                                $total = $total + $detalleventa->total;
                                @endphp    
                           @endforeach                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right"><span id="total">PEN {{ $total }}</span> </p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL IMPUESTO (18%):</p>
                                </th>
                                <th>
                                    <p align="right"><span id="total_impuesto">PEN {{$igv=($total*$venta->igv/100)}}</span></p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL PAGAR:</p>
                                </th>
                                <th>
                                    <p align="right"><span align="right" id="total_pagar_html">PEN {{($total+$igv)}}</span> <input type="hidden"
                                            name="total" id="total_pagar"></p>
                                </th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop