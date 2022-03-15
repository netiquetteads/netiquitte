
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
                    <div class="{{ $settings_sent_emails['column_class'] }}">
                        <div class="info-box">
                                <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                    <i class="fa fa-chart-line"></i>
                                </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ $settings_sent_emails['chart_title'] }}</span>
                                <span class="info-box-number">{{ number_format($settings_sent_emails['total_number']) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>

