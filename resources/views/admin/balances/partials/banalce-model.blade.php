<!-- Modal content -->
<div class="modal-content">
	<div style='float:right'>
		<span class="close"  onclick="CloseModal('');">&times;</span>
	</div>
	<div style='text-align:center; font-size:20px;'>
		({{ $AffiliateID }}) {{ $balance->affiliate }}
	</div>
	<center>
		<div id='tabcontainer'>
			<p class='tabstyle' onclick="OpenTab('Tab1')">Overview</p>
			<p class='tabstyle' onclick="OpenTab('Tab2')">Payment Status</p>
			<p class='tabstyle' onclick="OpenTab('Tab3')">Payment Method</p>
			<p class='tabstyle' onclick="OpenTab('Tab4')">Publisher Notes</p>
			<p class='tabstyle' onclick="OpenTab('Tab5')">Email Invoice</p>
		</div>
	</center>
	<div id='Tab1'>
		<table>
			<tr>
				<td>
					Revenue
				</td>
				<td>
					<div id="RevenueOriginal">
						@php
						if($revenue == '' || $revenue == '0')
						{
							echo '$0.00';
						}else{
							echo "$".round($revenue,2);
						}
						@endphp
						<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('RevenueOriginal','RevenueEdit');"></i>
					</div>
					<div id="RevenueEdit" style="display:none">
						<input type="text" id="RevenueEditValue">&nbsp;
						<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Revenue','RevenueEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Payout
				</td>
				<td>
					<div id="PayoutOriginal">
						@php
						if($payout == '' || $payout == '0')
						{
							echo '$0.00';
						}else{
							echo "$".round($payout,2);
						}
						@endphp
						<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('PayoutOriginal','PayoutEdit');"></i>
					</div>
					<div id="PayoutEdit" style="display:none">
						<input type="text" id="PayoutEditValue">&nbsp;
						<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Payout','PayoutEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Profit
				</td>
				<td>
					<div id='ProfitOrig'>
						@php
						if($profit == '' || $profit == '0')
						{
							echo '$0.00';
						}else{
							echo "$".round($profit,2);
						}
						@endphp
						<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('ProfitOrig','ProfitEdit');"></i>
					</div>
					<div id='ProfitEdit' style="display:none">
						<input type="text" id="ProfitEditValue">&nbsp;
						<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Profit','ProfitEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id='Tab2' style='display:none;'>
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
	<div id='Tab3' style='display:none;'>
		<label>Please select a payment method</label>
		<select class="form-control" id="PaymentType" onchange="PaymentDisplay('{{ $AffiliateID }}');">
			<option value=''>Please Select...</option>
			<option value='WIRE' @if ($balance->payment_type=='WIRE')
                selected
            @endif>Wire Transfer</option>
			<option value='ACH' @if ($balance->payment_type=='ACH')
                selected
            @endif>ACH</option>
			<option value='PAYPAL' @if ($balance->payment_type=='PAYPAL')
                selected
            @endif>Paypal</option>
		</select>&nbsp;
		<br/>
		<div id='PaymentContainer' style='display:none'>
		</div>
		<br/>
	</div>
	<div id='Tab4' style='display:none;'>
		<textarea class="form-control" id="PublisherNotes">{{ $balance->publisher_notes }}</textarea><br/>
		<button style='float:right' class='btn btn-success' onclick="SaveNotes('{{ $AffiliateID }}');">Save Notes</button>
	</div>
	<div id='Tab5' style='display:none;'>
		<textarea cols="80" id="editor1" class="ckeditor" name="editor1" rows="20"></textarea>&nbsp;<br/><br/>
		<button class='btn btn-success'>Send Email</button>
	</div>
  </div>