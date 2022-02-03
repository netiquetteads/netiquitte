                  <div class="tab-pane fade" id="vert-tabs-payment" role="tabpanel" aria-labelledby="vert-tabs-payment-tab">
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
