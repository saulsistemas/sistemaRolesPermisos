<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="producto_id">Producto</label>
            {!! Form::select('producto_id',$productos,null,['class'=>'form-control']) !!}
            @error('producto_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>        
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            {!! Form::number('cantidad', null,['class'=>'form-control']) !!}
            @error('cantidad')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>        
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label for="precio">Precio</label>
            {!! Form::number('precio', null,['class'=>'form-control']) !!}
            @error('precio')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>        
    </div>       
    <div class="col-md-2">
        <button type="submit" id="agregar" class="btn btn-primary " style="margin-top: 30px;">+</button>
    </div>
</div>



