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
                        <div class="{{ $settings1['column_class'] }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $settings1['chart_title'] }}</span>
                                    <span class="info-box-number">{{ number_format($settings1['total_number']) }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
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
@endsection