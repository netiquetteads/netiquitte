<div class="row">
    <div class="col-4 border border-3 py-2">
        <div class="form-group">
            <div class="form-check {{ $errors->has('name_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="name_select" value="0">
                <input class="form-check-input" type="checkbox" name="name_select" id="name_select" value="1" {{ $paymentMethod->name_select || old('name_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="name_select">{{ trans('cruds.paymentMethod.fields.name_select') }}</label>
            </div>
            @if($errors->has('name_select'))
                <span class="text-danger">{{ $errors->first('name_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('company_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="company_select" value="0">
                <input class="form-check-input" type="checkbox" name="company_select" id="company_select" value="1" {{ $paymentMethod->company_select || old('company_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="company_select">{{ trans('cruds.paymentMethod.fields.company_select') }}</label>
            </div>
            @if($errors->has('company_select'))
                <span class="text-danger">{{ $errors->first('company_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.company_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('account_num_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="account_num_select" value="0">
                <input class="form-check-input" type="checkbox" name="account_num_select" id="account_num_select" value="1" {{ $paymentMethod->account_num_select || old('account_num_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="account_num_select">{{ trans('cruds.paymentMethod.fields.account_num_select') }}</label>
            </div>
            @if($errors->has('account_num_select'))
                <span class="text-danger">{{ $errors->first('account_num_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_num_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('routing_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="routing_select" value="0">
                <input class="form-check-input" type="checkbox" name="routing_select" id="routing_select" value="1" {{ $paymentMethod->routing_select || old('routing_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="routing_select">{{ trans('cruds.paymentMethod.fields.routing_select') }}</label>
            </div>
            @if($errors->has('routing_select'))
                <span class="text-danger">{{ $errors->first('routing_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('explanation_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="explanation_select" value="0">
                <input class="form-check-input" type="checkbox" name="explanation_select" id="explanation_select" value="1" {{ $paymentMethod->explanation_select || old('explanation_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="explanation_select">{{ trans('cruds.paymentMethod.fields.explanation_select') }}</label>
            </div>
            @if($errors->has('explanation_select'))
                <span class="text-danger">{{ $errors->first('explanation_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.explanation_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('custom_email_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="custom_email_select" value="0">
                <input class="form-check-input" type="checkbox" name="custom_email_select" id="custom_email_select" value="1" {{ $paymentMethod->custom_email_select || old('custom_email_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="custom_email_select">{{ trans('cruds.paymentMethod.fields.custom_email_select') }}</label>
            </div>
            @if($errors->has('custom_email_select'))
                <span class="text-danger">{{ $errors->first('custom_email_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_select_helper') }}</span>
        </div>
        <div class="form-group">
            <div class="form-check {{ $errors->has('swift_select') ? 'is-invalid' : '' }}">
                <input type="hidden" name="swift_select" value="0">
                <input class="form-check-input" type="checkbox" name="swift_select" id="swift_select" value="1" {{ $paymentMethod->swift_select || old('swift_select', 0) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="swift_select">{{ trans('cruds.paymentMethod.fields.swift_select') }}</label>
            </div>
            @if($errors->has('swift_select'))
                <span class="text-danger">{{ $errors->first('swift_select') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_select_helper') }}</span>
        </div>





    </div>
    <div class="col-8 border border-1">



        <div class="form-group">
            <label for="explanation">{{ trans('cruds.paymentMethod.fields.explanation') }}</label>
            <textarea class="form-control {{ $errors->has('explanation') ? 'is-invalid' : '' }}" name="explanation" id="explanation">{{ old('explanation', $paymentMethod->explanation) }}</textarea>
            @if($errors->has('explanation'))
                <span class="text-danger">{{ $errors->first('explanation') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.explanation_helper') }}</span>
        </div>


        <div class="form-group">
            <label for="custom_email">{{ trans('cruds.paymentMethod.fields.custom_email') }}</label>
            <input class="form-control {{ $errors->has('custom_email') ? 'is-invalid' : '' }}" type="email" name="custom_email" id="custom_email" value="{{ old('custom_email', $paymentMethod->custom_email) }}">
            @if($errors->has('custom_email'))
                <span class="text-danger">{{ $errors->first('custom_email') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_helper') }}</span>
        </div>



    </div>
</div>
