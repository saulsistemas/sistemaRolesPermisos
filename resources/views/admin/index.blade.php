@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Dashboard</h1>
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
        <div class="row">
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Clientes</span>
                      <span class="info-box-number">
                        {{$clientes->count()}}
                      </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Categorias</span>
                      <span class="info-box-number">
                        {{$categorias->count()}}
                      </span>
                    </div>
                </div>
            </div>  
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Productos</span>
                      <span class="info-box-number">
                        {{$productos->count()}}
                      </span>
                    </div>
                </div>
            </div>      
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Ventas</span>
                      <span class="info-box-number">
                        {{$ventas->count()}}
                      </span>
                    </div>
                </div>
            </div>                              
        </div>
        {{-- <div>
            
            @foreach ($ventasmes as $item)
                {{  $meses[$item->mes].','; }}
            @endforeach
        </div> --}}
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>
    
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [ 
                    <?php
                    foreach ($ventasmes as $reg){ 
                        echo '"'.$meses[$reg->mes].'",';
                    }?>
                    ],
              datasets: [{
                  label: 'VENTAS POR MES',
                  data: [
                    <?php
                    foreach ($ventasmes as $reg){ 
                        echo  $reg->total_venta.',';
                    }?>
                  ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
      </script>
@stop