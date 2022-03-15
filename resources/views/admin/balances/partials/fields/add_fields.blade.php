<div class="row">
    <div class="col-12 border border-1">

        <div class="form-group" id="account_name_div" @if(@$paymentMethodType->account_name_select==false && @$paymentMethod->payment_method_type->account_name_select==false) style="display: none;" @endif>
            <label for="account_name">{{ trans('cruds.paymentMethod.fields.account_name') }}</label>
            <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', @$paymentMethod->account_name) }}">
            @if($errors->has('account_name'))
                <span class="text-danger">{{ $errors->first('account_name') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_helper') }}</span>
        </div>
        <div class="form-group" id="account_number_div" @if(@$paymentMethodType->account_num_select==false && @$paymentMethod->payment_method_type->account_num_select==false) style="display: none;" @endif>
            <label for="account_number">{{ trans('cruds.paymentMethod.fields.account_number') }}</label>
            <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', @$paymentMethod->account_number) }}">
            @if($errors->has('account_number'))
                <span class="text-danger">{{ $errors->first('account_number') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_number_helper') }}</span>
        </div>
        <div class="form-group" id="routing_number_div" @if(@$paymentMethodType->routing_select==false && @$paymentMethod->payment_method_type->routing_select==false) style="display: none;" @endif>
            <label for="routing_number">{{ trans('cruds.paymentMethod.fields.routing_number') }}</label>
            <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', @$paymentMethod->routing_number) }}">
            @if($errors->has('routing_number'))
                <span class="text-danger">{{ $errors->first('routing_number') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_number_helper') }}</span>
        </div>
        <div class="form-group" id="swift_div" @if(@$paymentMethodType->swift_select==false && @$paymentMethod->payment_method_type->swift_select==false) style="display: none;" @endif>
            <label for="swift">{{ trans('cruds.paymentMethod.fields.swift') }}</label>
            <input class="form-control {{ $errors->has('swift') ? 'is-invalid' : '' }}" type="text" name="swift" id="swift" value="{{ old('swift', @$paymentMethod->swift) }}">
            @if($errors->has('swift'))
                <span class="text-danger">{{ $errors->first('swift') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_helper') }}</span>
        </div>
        <div class="form-group" id="explanation_div" @if(@$paymentMethodType->notes_select==false && @$paymentMethod->payment_method_type->notes_select==false) style="display: none;" @endif>
            <label for="explanation">{{ trans('cruds.paymentMethod.fields.notes') }}</label>
            <textarea class="form-control {{ $errors->has('explanation') ? 'is-invalid' : '' }}" name="explanation" id="explanation" cols="30" rows="5">{{ old('explanation', @$paymentMethod->explanation) }}</textarea>
            @if($errors->has('explanation'))
                <span class="text-danger">{{ $errors->first('explanation') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_helper') }}</span>
        </div>
        <div class="form-group" id="paypal_email_div" @if(@$paymentMethodType->paypal_email_select==false && @$paymentMethod->payment_method_type->paypal_email_select==false) style="display: none;" @endif>
            <label for="paypal_email">{{ trans('cruds.paymentMethod.fields.paypal_email') }}</label>
            <input class="form-control {{ $errors->has('paypal_email') ? 'is-invalid' : '' }}" type="email" name="paypal_email" id="paypal_email" value="{{ old('paypal_email', @$paymentMethod->paypal_email) }}">
            @if($errors->has('paypal_email'))
                <span class="text-danger">{{ $errors->first('paypal_email') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_helper') }}</span>
        </div>
        <div class="form-group" id="custom_email_div" @if(@$paymentMethodType->custom_email_select==false && @$paymentMethod->payment_method_type->custom_email_select==false) style="display: none;" @endif>
            <label for="custom_email">{{ trans('cruds.paymentMethod.fields.custom_email') }}</label>
            <input class="form-control {{ $errors->has('custom_email') ? 'is-invalid' : '' }}" type="email" name="custom_email" id="custom_email" value="{{ old('custom_email', @$paymentMethod->custom_email) }}">
            @if($errors->has('custom_email'))
                <span class="text-danger">{{ $errors->first('custom_email') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_helper') }}</span>
        </div>
        
        
       
    </div>
</div>
