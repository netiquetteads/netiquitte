<div class="tab-pane fade" id="vert-tabs-mail-logs" role="tabpanel" aria-labelledby="vert-tabs-mail-logs-tab">

    <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-mail-logs" id="mailLogsTable">
        <thead>
            <tr>
                <th>
                    S.NO
                </th>
                <th>
                    Sent Date
                </th>
                <th>
                    Status
                </th>
               
                <th class="text-center">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentMailLogs as $pkey => $paymentMailLog)
            <tr>
                <td>{{ $pkey+1 }}</td>
                <td>{{ date('M d Y',strtotime($paymentMailLog->created_at)) }}</td>
                <td>
                    @if ($paymentMailLog->email_opened==0)
                        Not Opened
                    @else
                        Opened
                    @endif
                </td>
                <td><a href="javascript:void(0);" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#paymentMailLog{{ $paymentMailLog->id }}">View</a></td>
            </tr>
            
<!-- Modal -->
<div id="paymentMailLog{{ $paymentMailLog->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Email Body</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          {!! $paymentMailLog->email_body !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
            @endforeach
           
        </tbody>
    </table>

</div>