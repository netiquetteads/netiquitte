                  <div class="tab-pane text-left fade show active" id="vert-tabs-overview" role="tabpanel" aria-labelledby="vert-tabs-overview-tab">
					<table class="table" style="width: 80%;">
						<tr>
							<td style="width: 45%;text-align:right;">
								Revenue 
							</td>
							<td style="width: 45%;text-align:right;">
								<div id="RevenueOriginal">
									@php
									if($revenue == '' || $revenue == '0')
									{
										$revenueAmt = '0.00';
									}else{
										$revenueAmt = round($revenue,2);
									}
									echo "$".$revenueAmt;
									@endphp	 
								</div>
								<div id="RevenueEdit" style="display:none">
									<input type="text" id="RevenueEditValue" value="{{$revenueAmt}}">&nbsp;
									<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Revenue','RevenueEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
								</div>
							</td>
							<td style="width: 10%;text-align:right;"><i style='' class="fa fa-edit float-right" aria-hidden="true" onclick="OverViewEdit('RevenueOriginal','RevenueEdit');"></i></td>
						</tr>
						<tr>
							<td style="width: 45%;text-align:right;">
								@if (@$balance->monthly_status=='PAID')
                        <span class="badge bg-success float-left">PAID</span>
                    @elseif(@$balance->monthly_status=='UNPAID')
                        <span class="badge bg-danger float-left">NOT PAID</span>
                    {{-- @elseif($balance->monthly_status=='ISSUE')
                    <span class="badge bg-warning float-left">PENDING ISSUE</span> --}}
					@else
					<span class="badge bg-warning float-left">PENDING</span>
                @endif   Payout 							
							</td>
							<td style="width: 45%;text-align:right;">
								<div id="PayoutOriginal">
									@php
									if($payout == '' || $payout == '0')
									{
										$payoutAmt = '0.00';
									}else{
										$payoutAmt = round($payout,2);
									}
									echo "$".$payoutAmt;
									@endphp
								</div>
								<div id="PayoutEdit" style="display:none">
									<input type="text" id="PayoutEditValue" value="{{$payoutAmt}}">&nbsp;
									<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Payout','PayoutEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
								</div>
							</td>
							<td style="width: 10%;text-align:right;"><i style='' class="fa fa-edit float-right" aria-hidden="true" onclick="OverViewEdit('PayoutOriginal','PayoutEdit');"></i></td>
						</tr>
						<tr>
							<td style="width: 45%;text-align:right;">
								Profit
							</td>
							<td style="width: 45%;text-align:right;">
								<div id='ProfitOrig'>
									@php
									if($profit == '' || $profit == '0')
									{
										$profitAmt = '0.00';
									}else{
										$profitAmt = round($profit,2);
									}
									echo "$".$profitAmt;
									@endphp	  
								</div>
								<div id='ProfitEdit' style="display:none">
									<input type="text" id="ProfitEditValue" value="{{$profitAmt}}">&nbsp;
									<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Profit','ProfitEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
								</div>
							</td>
							<td style="width: 10%;text-align:right;">
								<i style='' class="fa fa-edit float-right" aria-hidden="true" onclick="OverViewEdit('ProfitOrig','ProfitEdit');"></i>
							</td>
						</tr>
						<tr>
							<th style="width: 45%;text-align:right;">TOTAL UNPAID</th>
							<td style="width: 45%;text-align:right;">
								
								@if (@$balance->monthly_status=='PAID')
								<span class="text-success">$ 00.00 </span><strong>/ {{ $total }}</strong>
								@elseif(@$balance->monthly_status=='UNPAID')
									<span class="text-danger">${{ $payoutAmt }} </span><strong>/ {{ $total }}</strong>
								{{-- @elseif($balance->monthly_status=='ISSUE')
									<span class="text-warning">${{ $payoutAmt }} </span><strong>/ {{ $total }}</strong> --}}
								@else
									<span class="text-warning">${{ $payoutAmt }} </span><strong>/ {{ $total }}</strong>
                				@endif

							</td>
							<td style="width: 10%;text-align:right;"></td>
						</tr>
					</table>
                  </div>