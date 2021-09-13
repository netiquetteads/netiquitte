<div class="tab-pane fade" id="vert-tabs-payment-status" role="tabpanel" aria-labelledby="vert-tabs-payment-status-tab">
    <label>Payment Status:</label>
		<select class="form-control" id="PaymentStatus">
			<option value='PAID' @if ($balance->monthly_status=='PAID')
                selected
            @endif>Mark as Paid</option>
			<option value='PENDING' @if ($balance->monthly_status=='PENDING')
                selected
            @endif>Mark as Pending</option>
			<option value='ISSUE' @if ($balance->monthly_status=='ISSUE')
                selected
            @endif>Mark as Issue</option>
		</select><br/>
		<button style='float:right' class='btn btn-success' onclick="SavePaymentStatus('{{ $Year }}','{{ $Month }}','{{ $AffiliateID }}')">Save Payment Information</button>
 </div>