@extends('layouts.admin')
@section('styles')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection

@section('content')

  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      @php
          Session::forget('success');
      @endphp
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="fa fa-times"></span>
      </button>
  </div>
  @endif

  @if ($users->count()>0)
    @foreach ($users as $user)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Hello Admin, {{ $user->first_name }} {{ $user->last_name }} waiting for approval! <a href="{{ route("userApproval",$user->id) }}">Click Here</a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="fa fa-times"></span>
      </button>
  </div>
    @endforeach
  @endif
        

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

                        @include('partials.dash.widgets')

                        @include('partials.dash.emails_sent')

                        <div class="row">
                            <div class="col-md-6">
                                @can('only_admin')
                                    @include('partials.dash.leftbox')
                                @endcan
                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">
                                @can('only_admin')
                                    @include('partials.dash.rightbox')
                                @endcan
                            </div>
                            <div class="col-md-12">
                                @can('only_admin')
                                    @include('partials.dash.barchart')
                                @endcan
                            </div>
                            <!-- /.col (RIGHT) -->


                        </div>
                        <!-- /.row -->

                    </div>

                    <div class="row">
                      <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@parent
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


{!! $chart5->renderJs() !!}
{!! $chart6->renderJs() !!}
{!! $chart7->renderJs() !!}

<script>

$(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,
            })
        });

  $(function () {

    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    getData();
    async function getData() {
                const response = await fetch('{{ route("api.balances.getChartData") }}');
                // console.log(response);
                const data = await response.json();
                // console.log(data);


  var barrChartData = {
      // make this year to date dynamic
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        {
          label               : "{{ date('Y') }}",
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
          data                : data["{{ date('Y') }}"]['profit']
        },
        {
          label               : "{{ date('Y',strtotime('-1 year')) }}",
          backgroundColor     : 'rgba(49, 73, 176, 0.6)',
          borderColor         : 'rgba(49, 73, 176, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(49, 73, 176, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          // make this year to date dynamic
          data                : data["{{ date('Y',strtotime('-1 year')) }}"]['profit']
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

// revenue-------------------------------------------

var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        {
          label               : "{{ date('Y') }}",
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data["{{ date('Y') }}"]['revenue']
        },
        {
          label               : "{{ date('Y',strtotime('-1 year')) }}",
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : data["{{ date('Y',strtotime('-1 year')) }}"]['revenue']
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

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })


    //-------------
    //- LINE CHART -
    //--------------


// Paid Total-------------------------------------------

var lineChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
      datasets: [
        {
          label               : "{{ date('Y') }}",
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data["{{ date('Y') }}"]['payout']
        },
        {
          label               : "{{ date('Y',strtotime('-1 year')) }}",
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : data["{{ date('Y',strtotime('-1 year')) }}"]['payout']
        },
      ]
    }

    var lineChartOptions = {
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

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, lineChartOptions)
    var lineChartData = $.extend(true, {}, lineChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    }

  });
</script>
@endsection
