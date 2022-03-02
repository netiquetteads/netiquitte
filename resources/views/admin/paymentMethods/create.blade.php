@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.paymentMethod.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-methods.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.paymentMethod.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method_type_id') ? 'is-invalid' : '' }}" name="payment_method_type_id" id="payment_method_type_id">
                    <option value disabled {{ old('payment_method_type_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($paymentMethodTypes as $key => $paymentMethodType)
                        <option value="{{ $paymentMethodType->id }}" {{ old('payment_method_type_id', '') === (string) $paymentMethodType->id ? 'selected' : '' }}>{{ $paymentMethodType->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.paymentMethod.fields.affiliates') }}</label>
                <select class="form-control select2 {{ $errors->has('affiliate_id') ? 'is-invalid' : '' }}" name="affiliate_id" id="affiliate_id">
                    <option value disabled {{ old('affiliate_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($affiliates as $key => $affiliate)
                        <option value="{{ $affiliate->id }}" {{ old('affiliate_id', '') === (string) $affiliate->id ? 'selected' : '' }}>{{ $affiliate->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
            </div>
            {{--  <div class="form-group">
                <label for="name">{{ trans('cruds.paymentMethod.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
            </div>  --}}
            <div class="form-group" id="account_name_div" style="display: none;">
                <label for="account_name">{{ trans('cruds.paymentMethod.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}">
                @if($errors->has('account_name'))
                    <span class="text-danger">{{ $errors->first('account_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group" id="account_number_div"  style="display: none;">
                <label for="account_number">{{ trans('cruds.paymentMethod.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}">
                @if($errors->has('account_number'))
                    <span class="text-danger">{{ $errors->first('account_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group" id="routing_number_div" style="display: none;">
                <label for="routing_number">{{ trans('cruds.paymentMethod.fields.routing_number') }}</label>
                <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', '') }}">
                @if($errors->has('routing_number'))
                    <span class="text-danger">{{ $errors->first('routing_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_number_helper') }}</span>
            </div>
            <div class="form-group" id="swift_div" style="display: none;">
                <label for="swift">{{ trans('cruds.paymentMethod.fields.swift') }}</label>
                <input class="form-control {{ $errors->has('swift') ? 'is-invalid' : '' }}" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                @if($errors->has('swift'))
                    <span class="text-danger">{{ $errors->first('swift') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_helper') }}</span>
            </div>
            <div class="form-group" id="paypal_email_div" style="display: none;">
                <label for="paypal_email">{{ trans('cruds.paymentMethod.fields.paypal_email') }}</label>
                <input class="form-control {{ $errors->has('paypal_email') ? 'is-invalid' : '' }}" type="email" name="paypal_email" id="paypal_email" value="{{ old('paypal_email') }}">
                @if($errors->has('paypal_email'))
                    <span class="text-danger">{{ $errors->first('paypal_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_helper') }}</span>
            </div>
            <div class="form-group" id="custom_email_div" style="display: none;">
                <label for="custom_email">{{ trans('cruds.paymentMethod.fields.custom_email') }}</label>
                <input class="form-control {{ $errors->has('custom_email') ? 'is-invalid' : '' }}" type="email" name="custom_email" id="custom_email" value="{{ old('custom_email') }}">
                @if($errors->has('custom_email'))
                    <span class="text-danger">{{ $errors->first('custom_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_helper') }}</span>
            </div>
            <div class="form-group" id="explanation_div" style="display: none;">
                <label for="explanation">{{ trans('cruds.paymentMethod.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('explanation') ? 'is-invalid' : '' }}" name="explanation" id="explanation" cols="30" rows="5">{{ old('explanation') }}</textarea>
                @if($errors->has('explanation'))
                    <span class="text-danger">{{ $errors->first('explanation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection


@section('scripts')
@parent

<script>
    $('#payment_method_type_id').change(function(){
        var id = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: 'POST',
            dataType:'json',
            url: "{{ route('admin.payment-methods.getPaymentType') }}",
            data: {id:id,_token:_token},
            success: function(response){
                console.log(response);
                if(response.account_name_select){
                    $('#account_name_div').show();
                }
                if(!response.account_name_select){
                    $('#account_name_div').hide();
                }
                if(response.account_num_select){
                    $('#account_number_div').show();
                }
                if(!response.account_num_select){
                    $('#account_number_div').hide();
                }
                if(response.custom_email_select){
                    $('#custom_email_div').show();
                }
                if(!response.custom_email_select){
                    $('#custom_email_div').hide();
                }
                if(response.notes_select){
                    $('#explanation_div').show();
                }
                if(!response.notes_select){
                    $('#explanation_div').hide();
                }
                if(response.paypal_email_select){
                    $('#paypal_email_div').show();
                }
                if(!response.paypal_email_select){
                    $('#paypal_email_div').hide();
                }
                if(response.routing_select){
                    $('#routing_number_div').show();
                }
                if(!response.routing_select){
                    $('#routing_number_div').hide();
                }
                if(response.swift_select){
                    $('#swift_div').show();
                }
                if(!response.swift_select){
                    $('#swift_div').hide();
                }
            }
        });
    });
</script>

@endsection