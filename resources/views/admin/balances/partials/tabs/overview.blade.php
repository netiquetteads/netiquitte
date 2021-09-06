                  <div class="tab-pane text-left fade show active" id="vert-tabs-overview" role="tabpanel" aria-labelledby="vert-tabs-overview-tab">
					<table class="table">
						<tr>
							<td>
								Revenue
							</td>
							<td>
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
									<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('RevenueOriginal','RevenueEdit');"></i>
								</div>
								<div id="RevenueEdit" style="display:none">
									<input type="text" id="RevenueEditValue" value="{{$revenueAmt}}">&nbsp;
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
										$payoutAmt = '0.00';
									}else{
										$payoutAmt = round($payout,2);
									}
									echo "$".$payoutAmt;
									@endphp
									<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('PayoutOriginal','PayoutEdit');"></i>
								</div>
								<div id="PayoutEdit" style="display:none">
									<input type="text" id="PayoutEditValue" value="{{$payoutAmt}}">&nbsp;
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
										$profitAmt = '0.00';
									}else{
										$profitAmt = round($profit,2);
									}
									echo "$".$profitAmt;
									@endphp
									<i style='' class="fa fa-edit" aria-hidden="true" onclick="OverViewEdit('ProfitOrig','ProfitEdit');"></i>
								</div>
								<div id='ProfitEdit' style="display:none">
									<input type="text" id="ProfitEditValue" value="{{$profitAmt}}">&nbsp;
									<button class='btn btn-success' onclick="SaveAccounting('{{ $AffiliateID }}','Profit','ProfitEditValue','{{ $Month }}','{{ $Year }}')">Save</button>
								</div>
							</td>
						</tr>
					</table>
                  </div>