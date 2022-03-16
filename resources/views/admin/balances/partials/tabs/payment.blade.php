                  <div class="tab-pane fade" id="vert-tabs-payment" role="tabpanel" aria-labelledby="vert-tabs-payment-tab">

						<form id="paymentMethodForm" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="paymentMethodId" value="{{ @$paymentMethod->id }}">
                            {{--  @method('PUT')  --}}
                            {{-- <input type="hidden" name="payment_method_type_id" id="paymentMethodTypeId" value="{{ @$paymentMethod->payment_method_type->id }}">
                            <input type="hidden" name="id" id="paymentMethodId" value="{{ @$paymentMethod->id }}">
                        <div class="container box">
						<div class="form-group">
                        <label for="payment_method">Please select a payment method</label>
						 <input type="text" name="name" id="payment_method" class="form-control input-lg" placeholder="Enter Payment Type" autocomplete="off" value="{{ @$paymentMethod->payment_method_type->name }}" />
						 <div id="paymentList" style="position: absolute;">
						 </div>
						</div>
                    </div> --}}
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
                        
                        
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="payment_method">Please select a payment method</label>
                                <select name="payment_method_type_id" id="payment_method" class="form-control select2" style="width: 100%;">
                                    <option value="">Select</option>
                                    @foreach ($paymentMethodTypes as $type)
                                    <option value="{{ $type->id }}" @if (@$paymentMethod->payment_method_type_id==$type->id)
                                        selected
                                    @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group col-md-4">
                                <button type="button" class="btn btn-success mt-4 float-right" data-toggle="modal" data-target="#createMethodModal">Create a new method</button>
                            </div>
                        </div>						

                        <div id="add_fields">
						    @include('admin.balances.partials.fields.add_fields')
                        </div>

                        <br>
                        <input type="hidden" name="affiliate_id" id="AffiliateID" value="{{ $AffiliateID  }}">
                        <div class="row float-left">
                            <div class="form-group col-md-6">
                                <div class="form-check {{ $errors->has('w8') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="w8" value="0">
                                    <input class="form-check-input" type="checkbox" name="w8" id="w8" value="1" {{ @$affiliate->w8 || old('w8', 0) === 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="w8">{{ trans('cruds.paymentMethod.fields.w8') }}</label>
                                </div>
                                @if($errors->has('w8'))
                                    <span class="text-danger">{{ $errors->first('w8') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.paymentMethod.fields.w8_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-check {{ $errors->has('w9') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="w9" value="0">
                                    <input class="form-check-input" type="checkbox" name="w9" id="w9" value="1" {{ @$affiliate->w9 || old('w9', 0) === 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="w9">{{ trans('cruds.paymentMethod.fields.w9') }}</label>
                                </div>
                                @if($errors->has('w9'))
                                    <span class="text-danger">{{ $errors->first('w9') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.paymentMethod.fields.w9_helper') }}</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success float-right" id="SavePaymentInfo">Save Payment Information</button>
                    </form>
                  </div>
