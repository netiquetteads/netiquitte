                  <div class="tab-pane fade" id="vert-tabs-payment" role="tabpanel" aria-labelledby="vert-tabs-payment-tab">

						<form id="paymentMethodForm" method="POST">
                            @csrf
                            {{--  @method('PUT')  --}}
                            <input type="hidden" name="payment_method_type_id" id="paymentMethodTypeId" value="{{ @$paymentMethod->payment_method_type->id }}">
                            <input type="hidden" name="id" id="paymentMethodId" value="{{ @$paymentMethod->id }}">
                        <div class="container box">
						<div class="form-group">
                        <label for="payment_method">Please select a payment method</label>
						 <input type="text" name="name" id="payment_method" class="form-control input-lg" placeholder="Enter Payment Type" autocomplete="off" value="{{ @$paymentMethod->payment_method_type->name }}" />
						 <div id="paymentList" style="position: absolute;">
						 </div>
						</div>
                    </div>
						{{--  {{ csrf_field() }}  --}}

                     {{--  <label>Please select a payment method</label>
                        <select class="form-control" id="PaymentType" onchange="PaymentDisplay('{{ $AffiliateID }}');">
                            <option value=''>Please Select...</option>
                            <option value='WIRE' @if (@$balance->payment_type=='WIRE')
                                selected
                            @endif>Wire Transfer</option>
                            <option value='ACH' @if (@$balance->payment_type=='ACH')
                                selected
                            @endif>ACH</option>
                            <option value='PAYPAL' @if (@$balance->payment_type=='PAYPAL')
                                selected
                            @endif>Paypal</option>
                        </select>&nbsp;
                        <br/>
                        <div id='PaymentContainer' style='display:none'>
                        </div>
                        <br/>  --}}


						@include('admin.balances.partials.fields.add_fields')

                        <br>
                        <input type="hidden" name="affiliate_id" id="AffiliateID" value="{{ $AffiliateID  }}">
                        <button type="button" class="btn btn-success float-right" id="SavePaymentInfo">Save Payment Information</button>
                    </form>
                  </div>
