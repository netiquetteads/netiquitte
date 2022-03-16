@extends('layouts.admin')
@section('content')

<div class="card col-md-8">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.advertiser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.advertisers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.advertiser.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.advertiser.fields.account_status') }}</label>
                <select class="form-control {{ $errors->has('account_status') ? 'is-invalid' : '' }}" name="account_status" id="account_status">
                    <option value disabled {{ old('account_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Advertiser::ACCOUNT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_status'))
                    <span class="text-danger">{{ $errors->first('account_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.account_status_helper') }}</span>
            </div>
           {{--  <div class="form-group">
                <label for="everflow_account">{{ trans('cruds.advertiser.fields.everflow_account') }}</label>
                <input class="form-control {{ $errors->has('everflow_account') ? 'is-invalid' : '' }}" type="text" name="everflow_account" id="everflow_account" value="{{ old('everflow_account', '') }}">
                @if($errors->has('everflow_account'))
                    <span class="text-danger">{{ $errors->first('everflow_account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.everflow_account_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="featured_image">{{ trans('cruds.advertiser.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.featured_image_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="account_manager_name">{{ trans('cruds.advertiser.fields.account_manager_name') }}</label>
                <input class="form-control {{ $errors->has('account_manager_name') ? 'is-invalid' : '' }}" type="text" name="account_manager_name" id="account_manager_name" value="{{ old('account_manager_name', '') }}">
                @if($errors->has('account_manager_name'))
                    <span class="text-danger">{{ $errors->first('account_manager_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.account_manager_name_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="account_executive_name">{{ trans('cruds.advertiser.fields.account_executive_name') }}</label>
                <input class="form-control {{ $errors->has('account_executive_name') ? 'is-invalid' : '' }}" type="text" name="account_executive_name" id="account_executive_name" value="{{ old('account_executive_name', '') }}">
                @if($errors->has('account_executive_name'))
                    <span class="text-danger">{{ $errors->first('account_executive_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.account_executive_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="balance">{{ trans('cruds.advertiser.fields.balance') }}</label>
                <input class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="number" name="balance" id="balance" value="{{ old('balance', '') }}" step="0.01">
                @if($errors->has('balance'))
                    <span class="text-danger">{{ $errors->first('balance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_login">{{ trans('cruds.advertiser.fields.last_login') }}</label>
                <input class="form-control datetime {{ $errors->has('last_login') ? 'is-invalid' : '' }}" type="text" name="last_login" id="last_login" value="{{ old('last_login') }}">
                @if($errors->has('last_login'))
                    <span class="text-danger">{{ $errors->first('last_login') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.last_login_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_country_code">{{ trans('cruds.advertiser.fields.network_country_code') }}</label>
                <input class="form-control {{ $errors->has('network_country_code') ? 'is-invalid' : '' }}" type="text" name="network_country_code" id="network_country_code" value="{{ old('network_country_code', 'US') }}">
                @if($errors->has('network_country_code'))
                    <span class="text-danger">{{ $errors->first('network_country_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.network_country_code_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="global_tracking_domain_url">{{ trans('cruds.advertiser.fields.global_tracking_domain_url') }}</label>
                <input class="form-control {{ $errors->has('global_tracking_domain_url') ? 'is-invalid' : '' }}" type="text" name="global_tracking_domain_url" id="global_tracking_domain_url" value="{{ old('global_tracking_domain_url', '') }}">
                @if($errors->has('global_tracking_domain_url'))
                    <span class="text-danger">{{ $errors->first('global_tracking_domain_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.global_tracking_domain_url_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.advertiser.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.published_helper') }}</span>
            </div>
           {{--  <div class="form-group">
                <label for="today_revenue">{{ trans('cruds.advertiser.fields.today_revenue') }}</label>
                <input class="form-control {{ $errors->has('today_revenue') ? 'is-invalid' : '' }}" type="number" name="today_revenue" id="today_revenue" value="{{ old('today_revenue', '0.00') }}" step="0.01">
                @if($errors->has('today_revenue'))
                    <span class="text-danger">{{ $errors->first('today_revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.today_revenue_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="network_affiliateid">{{ trans('cruds.advertiser.fields.network_affiliateid') }}</label>
                <input class="form-control {{ $errors->has('network_affiliateid') ? 'is-invalid' : '' }}" type="number" name="network_affiliateid" id="network_affiliateid" value="{{ old('network_affiliateid', '') }}" step="1">
                @if($errors->has('network_affiliateid'))
                    <span class="text-danger">{{ $errors->first('network_affiliateid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.network_affiliateid_helper') }}</span>
            </div> --}}
           {{--  <div class="form-group">
                <label for="account_executiveid">{{ trans('cruds.advertiser.fields.account_executiveid') }}</label>
                <input class="form-control {{ $errors->has('account_executiveid') ? 'is-invalid' : '' }}" type="number" name="account_executiveid" id="account_executiveid" value="{{ old('account_executiveid', '') }}" step="1">
                @if($errors->has('account_executiveid'))
                    <span class="text-danger">{{ $errors->first('account_executiveid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.account_executiveid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_managerid">{{ trans('cruds.advertiser.fields.account_managerid') }}</label>
                <input class="form-control {{ $errors->has('account_managerid') ? 'is-invalid' : '' }}" type="number" name="account_managerid" id="account_managerid" value="{{ old('account_managerid', '') }}" step="1">
                @if($errors->has('account_managerid'))
                    <span class="text-danger">{{ $errors->first('account_managerid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.account_managerid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="networkid">{{ trans('cruds.advertiser.fields.networkid') }}</label>
                <input class="form-control {{ $errors->has('networkid') ? 'is-invalid' : '' }}" type="number" name="networkid" id="networkid" value="{{ old('networkid', '') }}" step="1">
                @if($errors->has('networkid'))
                    <span class="text-danger">{{ $errors->first('networkid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.networkid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_employeeid">{{ trans('cruds.advertiser.fields.network_employeeid') }}</label>
                <input class="form-control {{ $errors->has('network_employeeid') ? 'is-invalid' : '' }}" type="number" name="network_employeeid" id="network_employeeid" value="{{ old('network_employeeid', '') }}" step="1">
                @if($errors->has('network_employeeid'))
                    <span class="text-danger">{{ $errors->first('network_employeeid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.network_employeeid_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="internal_notes">{{ trans('cruds.advertiser.fields.internal_notes') }}</label>
                <textarea class="form-control {{ $errors->has('internal_notes') ? 'is-invalid' : '' }}" name="internal_notes" id="internal_notes">{{ old('internal_notes') }}</textarea>
                @if($errors->has('internal_notes'))
                    <span class="text-danger">{{ $errors->first('internal_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.internal_notes_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <div class="form-check {{ $errors->has('is_contact_address_enabled') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_contact_address_enabled" value="0">
                    <input class="form-check-input" type="checkbox" name="is_contact_address_enabled" id="is_contact_address_enabled" value="1" {{ old('is_contact_address_enabled', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_contact_address_enabled">{{ trans('cruds.advertiser.fields.is_contact_address_enabled') }}</label>
                </div>
                @if($errors->has('is_contact_address_enabled'))
                    <span class="text-danger">{{ $errors->first('is_contact_address_enabled') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.is_contact_address_enabled_helper') }}</span>
            </div> --}}
           {{--  <div class="form-group">
                <label for="sales_managerid">{{ trans('cruds.advertiser.fields.sales_managerid') }}</label>
                <input class="form-control {{ $errors->has('sales_managerid') ? 'is-invalid' : '' }}" type="number" name="sales_managerid" id="sales_managerid" value="{{ old('sales_managerid', '') }}" step="1">
                @if($errors->has('sales_managerid'))
                    <span class="text-danger">{{ $errors->first('sales_managerid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.sales_managerid_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <div class="form-check {{ $errors->has('is_expose_publisher_reporting_data') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_expose_publisher_reporting_data" value="0">
                    <input class="form-check-input" type="checkbox" name="is_expose_publisher_reporting_data" id="is_expose_publisher_reporting_data" value="1" {{ old('is_expose_publisher_reporting_data', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_expose_publisher_reporting_data">{{ trans('cruds.advertiser.fields.is_expose_publisher_reporting_data') }}</label>
                </div>
                @if($errors->has('is_expose_publisher_reporting_data'))
                    <span class="text-danger">{{ $errors->first('is_expose_publisher_reporting_data') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.is_expose_publisher_reporting_data_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="platform_name">{{ trans('cruds.advertiser.fields.platform_name') }}</label>
                <input class="form-control {{ $errors->has('platform_name') ? 'is-invalid' : '' }}" type="text" name="platform_name" id="platform_name" value="{{ old('platform_name', '') }}">
                @if($errors->has('platform_name'))
                    <span class="text-danger">{{ $errors->first('platform_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.platform_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="platform_url">{{ trans('cruds.advertiser.fields.platform_url') }}</label>
                <input class="form-control {{ $errors->has('platform_url') ? 'is-invalid' : '' }}" type="text" name="platform_url" id="platform_url" value="{{ old('platform_url', '') }}">
                @if($errors->has('platform_url'))
                    <span class="text-danger">{{ $errors->first('platform_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.platform_url_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="platform_username">{{ trans('cruds.advertiser.fields.platform_username') }}</label>
                <input class="form-control {{ $errors->has('platform_username') ? 'is-invalid' : '' }}" type="text" name="platform_username" id="platform_username" value="{{ old('platform_username', '') }}">
                @if($errors->has('platform_username'))
                    <span class="text-danger">{{ $errors->first('platform_username') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.platform_username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accounting_contact_email">{{ trans('cruds.advertiser.fields.accounting_contact_email') }}</label>
                <input class="form-control {{ $errors->has('accounting_contact_email') ? 'is-invalid' : '' }}" type="email" name="accounting_contact_email" id="accounting_contact_email" value="{{ old('accounting_contact_email') }}">
                @if($errors->has('accounting_contact_email'))
                    <span class="text-danger">{{ $errors->first('accounting_contact_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.accounting_contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_id_macro">{{ trans('cruds.advertiser.fields.offer_id_macro') }}</label>
                <input class="form-control {{ $errors->has('offer_id_macro') ? 'is-invalid' : '' }}" type="text" name="offer_id_macro" id="offer_id_macro" value="{{ old('offer_id_macro', '') }}">
                @if($errors->has('offer_id_macro'))
                    <span class="text-danger">{{ $errors->first('offer_id_macro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.offer_id_macro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="affiliate_id_macro">{{ trans('cruds.advertiser.fields.affiliate_id_macro') }}</label>
                <input class="form-control {{ $errors->has('affiliate_id_macro') ? 'is-invalid' : '' }}" type="text" name="affiliate_id_macro" id="affiliate_id_macro" value="{{ old('affiliate_id_macro', '') }}">
                @if($errors->has('affiliate_id_macro'))
                    <span class="text-danger">{{ $errors->first('affiliate_id_macro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.affiliate_id_macro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attribution_method">{{ trans('cruds.advertiser.fields.attribution_method') }}</label>
                <input class="form-control {{ $errors->has('attribution_method') ? 'is-invalid' : '' }}" type="text" name="attribution_method" id="attribution_method" value="{{ old('attribution_method', 'last_touch') }}">
                @if($errors->has('attribution_method'))
                    <span class="text-danger">{{ $errors->first('attribution_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.attribution_method_helper') }}</span>
            </div> --}}
            {{-- <div class="form-group">
                <label for="email_attribution_method">{{ trans('cruds.advertiser.fields.email_attribution_method') }}</label>
                <input class="form-control {{ $errors->has('email_attribution_method') ? 'is-invalid' : '' }}" type="text" name="email_attribution_method" id="email_attribution_method" value="{{ old('email_attribution_method', 'last_affiliate_attribution') }}">
                @if($errors->has('email_attribution_method'))
                    <span class="text-danger">{{ $errors->first('email_attribution_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.email_attribution_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_advertiserid">{{ trans('cruds.advertiser.fields.network_advertiserid') }}</label>
                <input class="form-control {{ $errors->has('network_advertiserid') ? 'is-invalid' : '' }}" type="number" name="network_advertiserid" id="network_advertiserid" value="{{ old('network_advertiserid', '') }}" step="1">
                @if($errors->has('network_advertiserid'))
                    <span class="text-danger">{{ $errors->first('network_advertiserid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.advertiser.fields.network_advertiserid_helper') }}</span>
            </div> --}}
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
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.advertisers.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($advertiser) && $advertiser->featured_image)
      var file = {!! json_encode($advertiser->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
