<div class="row">
    <div class="col-4 border border-3 py-2">
        {{--  <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('name_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="name_select" value="0">
                <input class="form-check-input" type="checkbox" name="name_select" id="name_select" value="1" {{ @$paymentMethod->name_select || old('name_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="name_select">{{ trans('cruds.paymentMethod.fields.name_select') }}</label>
            </div>
            @if($errors->has('name_select'))
                <span class="text-danger">{{ $errors->first('name_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_select_helper') }}</span>
        </div>  --}}
        {{--  <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('company_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="company_select" value="0">
                <input class="form-check-input" type="checkbox" name="company_select" id="company_select" value="2" {{ @$paymentMethod->company_select || old('company_select', 0) === 2 ? 'checked' : '' }}>
                <label class="form-check-label" for="company_select">{{ trans('cruds.paymentMethod.fields.company_select') }}</label>
            </div>
            @if($errors->has('company_select'))
                <span class="text-danger">{{ $errors->first('company_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.company_select_helper') }}</span>
        </div>  --}}
        <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('account_name_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="account_name_select" value="0">
                <input class="form-check-input" type="checkbox" name="account_name_select" id="account_name_select" value="3" {{ @$paymentMethod->account_name_select || old('account_name_select', 0) === 3 ? 'checked' : '' }}>
                <label class="form-check-label" for="account_name_select">{{ trans('cruds.paymentMethod.fields.account_name_select') }}</label>
            </div>
            @if($errors->has('account_name_select'))
                <span class="text-danger">{{ $errors->first('account_name_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_select_helper') }}</span>
        </div>
        <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('account_num_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="account_num_select" value="0">
                <input class="form-check-input" type="checkbox" name="account_num_select" id="account_num_select" value="4" {{ @$paymentMethod->account_num_select || old('account_num_select', 0) === 4 ? 'checked' : '' }}>
                <label class="form-check-label" for="account_num_select">{{ trans('cruds.paymentMethod.fields.account_num_select') }}</label>
            </div>
            @if($errors->has('account_num_select'))
                <span class="text-danger">{{ $errors->first('account_num_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_num_select_helper') }}</span>
        </div>
        <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('routing_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="routing_select" value="0">
                <input class="form-check-input" type="checkbox" name="routing_select" id="routing_select" value="5" {{ @$paymentMethod->routing_select || old('routing_select', 0) === 5 ? 'checked' : '' }}>
                <label class="form-check-label" for="routing_select">{{ trans('cruds.paymentMethod.fields.routing_select') }}</label>
            </div>
            @if($errors->has('routing_select'))
                <span class="text-danger">{{ $errors->first('routing_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_select_helper') }}</span>
        </div>
        
        <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('explanation_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="explanation_select" value="0">
                <input class="form-check-input" type="checkbox" name="explanation_select" id="explanation_select" value="6" {{ @$paymentMethod->explanation_select || old('explanation_select', 0) === 6 ? 'checked' : '' }}>
                <label class="form-check-label" for="explanation_select">{{ trans('cruds.paymentMethod.fields.notes_select') }}</label>
            </div>
            @if($errors->has('explanation_select'))
                <span class="text-danger">{{ $errors->first('explanation_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_select_helper') }}</span>
        </div>
        <div class="form-group selectFields" id="custom_email_select_div">
            <div class="form-check {{ $errors->has('custom_email_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="custom_email_select" value="0">
                <input class="form-check-input" type="checkbox" name="custom_email_select" id="custom_email_select" value="7" {{ @$paymentMethod->custom_email_select || old('custom_email_select', 0) === 7 ? 'checked' : '' }}>
                <label class="form-check-label" for="custom_email_select">{{ trans('cruds.paymentMethod.fields.custom_email_select') }}</label>
            </div>
            @if($errors->has('custom_email_select'))
                <span class="text-danger">{{ $errors->first('custom_email_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_select_helper') }}</span>
        </div>
        <div class="form-group selectFields" id="swift_select_div">
            <div class="form-check {{ $errors->has('swift_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="swift_select" value="0">
                <input class="form-check-input" type="checkbox" name="swift_select" id="swift_select" value="8" {{ @$paymentMethod->swift_select || old('swift_select', 0) === 8 ? 'checked' : '' }}>
                <label class="form-check-label" for="swift_select">{{ trans('cruds.paymentMethod.fields.swift_select') }}</label>
            </div>
            @if($errors->has('swift_select'))
                <span class="text-danger">{{ $errors->first('swift_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_select_helper') }}</span>
        </div>
        <div class="form-group selectFields">
            <div class="form-check {{ $errors->has('paypal_email_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="paypal_email_select" value="0">
                <input class="form-check-input" type="checkbox" name="paypal_email_select" id="paypal_email_select" value="9" {{ @$paymentMethod->paypal_email_select || old('paypal_email_select', 0) === 9 ? 'checked' : '' }}>
                <label class="form-check-label" for="paypal_email_select">{{ trans('cruds.paymentMethod.fields.paypal_email_select') }}</label>
            </div>
            @if($errors->has('paypal_email_select'))
                <span class="text-danger">{{ $errors->first('paypal_email_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_select_helper') }}</span>
        </div>
       
       




    </div>
    <div class="col-8 border border-1">

        {{--  <div class="form-group" id="name_div" @if(@$paymentMethod->name_select==false) style="display: none;" @endif>
            <label for="name">{{ trans('cruds.paymentMethod.fields.name') }}</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', @$paymentMethod->name) }}">
            @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
        </div>  --}}
        <div class="form-group" id="account_name_div" @if(@$paymentMethod->account_name_select==false) style="display: none;" @endif>
            <label for="account_name">{{ trans('cruds.paymentMethod.fields.account_name') }}</label>
            <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', @$paymentMethod->account_name) }}">
            @if($errors->has('account_name'))
                <span class="text-danger">{{ $errors->first('account_name') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_helper') }}</span>
        </div>
        <div class="form-group" id="account_number_div" @if(@$paymentMethod->account_num_select==false) style="display: none;" @endif>
            <label for="account_number">{{ trans('cruds.paymentMethod.fields.account_number') }}</label>
            <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', @$paymentMethod->account_number) }}">
            @if($errors->has('account_number'))
                <span class="text-danger">{{ $errors->first('account_number') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_number_helper') }}</span>
        </div>
        <div class="form-group" id="routing_number_div" @if(@$paymentMethod->routing_select==false) style="display: none;" @endif>
            <label for="routing_number">{{ trans('cruds.paymentMethod.fields.routing_number') }}</label>
            <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', @$paymentMethod->routing_number) }}">
            @if($errors->has('routing_number'))
                <span class="text-danger">{{ $errors->first('routing_number') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_number_helper') }}</span>
        </div>
        <div class="form-group" id="swift_div" @if(@$paymentMethod->swift_select==false) style="display: none;" @endif>
            <label for="swift">{{ trans('cruds.paymentMethod.fields.swift') }}</label>
            <input class="form-control {{ $errors->has('swift') ? 'is-invalid' : '' }}" type="text" name="swift" id="swift" value="{{ old('swift', @$paymentMethod->swift) }}">
            @if($errors->has('swift'))
                <span class="text-danger">{{ $errors->first('swift') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_helper') }}</span>
        </div>
        <div class="form-group" id="paypal_email_div" @if(@$paymentMethod->paypal_email_select==false) style="display: none;" @endif>
            <label for="paypal_email">{{ trans('cruds.paymentMethod.fields.paypal_email') }}</label>
            <input class="form-control {{ $errors->has('paypal_email') ? 'is-invalid' : '' }}" type="email" name="paypal_email" id="paypal_email" value="{{ old('paypal_email', @$paymentMethod->paypal_email) }}">
            @if($errors->has('paypal_email'))
                <span class="text-danger">{{ $errors->first('paypal_email') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_helper') }}</span>
        </div>
        <div class="form-group" id="custom_email_div" @if(@$paymentMethod->custom_email_select==false) style="display: none;" @endif>
            <label for="custom_email">{{ trans('cruds.paymentMethod.fields.custom_email') }}</label>
            <input class="form-control {{ $errors->has('custom_email') ? 'is-invalid' : '' }}" type="email" name="custom_email" id="custom_email" value="{{ old('custom_email', @$paymentMethod->custom_email) }}">
            @if($errors->has('custom_email'))
                <span class="text-danger">{{ $errors->first('custom_email') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_helper') }}</span>
        </div>
        <div class="form-group" id="explanation_div" @if(@$paymentMethod->explanation_select==false) style="display: none;" @endif>
            <label for="explanation">{{ trans('cruds.paymentMethod.fields.notes') }}</label>
            <textarea class="form-control {{ $errors->has('explanation') ? 'is-invalid' : '' }}" name="explanation" id="explanation" cols="30" rows="5">{{ old('explanation', @$paymentMethod->explanation) }}</textarea>
            @if($errors->has('explanation'))
                <span class="text-danger">{{ $errors->first('explanation') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_helper') }}</span>
        </div>
        
       
    </div>
</div>
