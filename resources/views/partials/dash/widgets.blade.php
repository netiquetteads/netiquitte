          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Active {{ number_format($OfferActiveCountSidebar) }}</h3>

                <p>{{ $settings3['chart_title'] }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-laptop"></i>
              </div>
              <a href="{{ url("admin/offer/active") }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ number_format($AdvertiserActiveCountSidebar) }}{{-- <sup style="font-size: 20px">%</sup> --}}</h3>

                <p>Active {{ $settings2['chart_title'] }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ url("admin/advertiser/active") }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ number_format($AffiliateActiveCountSidebar) }}</h3>

                <p>Active Affiliates</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ url("admin/affiliate/active") }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ number_format($settings4['total_number']) }}</h3>

                <p>Email Campaigns</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="{{ route("admin.campaigns.index") }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
