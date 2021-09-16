        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseModal('');">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              

        <!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              ({{ $AffiliateID }}) <strong>{{ $balance->affiliate }}</strong>
            </h3>
          </div>
          <div class="card-body">
            <h4>{{ $Month }} {{ $Year }}</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-overview-tab" data-toggle="pill" href="#vert-tabs-overview" role="tab" aria-controls="vert-tabs-overview" aria-selected="true">Overview</a>
                  <a class="nav-link" id="vert-tabs-payment-status-tab" data-toggle="pill" href="#vert-tabs-payment-status" role="tab" aria-controls="vert-tabs-payment-status" aria-selected="false">Payment Status</a>
                  <a class="nav-link" id="vert-tabs-payment-tab" data-toggle="pill" href="#vert-tabs-payment" role="tab" aria-controls="vert-tabs-payment" aria-selected="false">Payment</a>
                  <a class="nav-link" id="vert-tabs-notes-tab" data-toggle="pill" href="#vert-tabs-notes" role="tab" aria-controls="vert-tabs-notes" aria-selected="false">Publisher Notes</a>
                  <a class="nav-link" id="vert-tabs-email-tab" data-toggle="pill" href="#vert-tabs-email" role="tab" aria-controls="vert-tabs-email" aria-selected="false">Email Invoice</a>
                </div>
              </div> 
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                      @include('admin.balances.partials.tabs.overview')

                      @include('admin.balances.partials.tabs.payment-status')

                      @include('admin.balances.partials.tabs.payment')

                      @include('admin.balances.partials.tabs.notes')

                      @include('admin.balances.partials.tabs.email')
                </div>
              </div>
            </div>
 
          </div>
          <!-- /.card -->
        </div>






            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="CloseModal('');">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 