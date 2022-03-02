@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        {{-- @include('partials.dash.old-icons') --}}
                        @include('partials.dash.widgets')
                        <div class="row">
                            <div class="col-md-6">
                                @include('partials.dash.leftbox')
                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">
                                @include('partials.dash.rightbox')
                            </div>
                            <div class="col-md-12">
                                @include('partials.dash.barchart')
                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                        {{-- @include('partials.dash.revenue') --}}
                        {{-- @include('partials.dash.profit') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

{!! $chart5->renderJs() !!}
{!! $chart6->renderJs() !!}
{!! $chart7->renderJs() !!}

<script>
  $(function () {
    
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : '2022',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : '2021',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

  var barrChartData = {
      // make this year to date dynamic
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : '2022',
          backgroundColor     : 'rgba(34,68,237,0.9)',
          // backgroundColor     : 'rgba(197,15,109,0.9)',
          borderColor         : 'rgba(34,68,237,0.8)',
          // borderColor         : 'rgba(197,15,109,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(34,68,237,1)',
          // pointStrokeColor    : 'rgba(197,15,109,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(34,68,237,1)',
          // pointHighlightStroke: 'rgba(197,15,109,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : '2021',
          backgroundColor     : 'rgba(49, 73, 176, 0.6)',
          borderColor         : 'rgba(49, 73, 176, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(49, 73, 176, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          // make this year to date dynamic
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var barrChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }




    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

   

    

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, barrChartData)
    var temp0 = barrChartData.datasets[0]
    var temp1 = barrChartData.datasets[1]
    barrChartData.datasets[0] = temp1
    barrChartData.datasets[1] = temp0

    var barrChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barrChartData,
      options: barrChartOptions
    })

    
  });
</script>
@endsection