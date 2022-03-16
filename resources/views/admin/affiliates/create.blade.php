@extends('layouts.admin')
@section('content')

<div class="card col-md-8">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.affiliate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.affiliates.store") }}" enctype="multipart/form-data">
            @csrf

                <div class="form-group">
                    <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="published" value="0">
                        <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">{{ trans('cruds.affiliate.fields.published') }}</label>
                    </div>
                    @if($errors->has('published'))
                        <span class="text-danger">{{ $errors->first('published') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.affiliate.fields.published_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="account_status_id">{{ trans('cruds.affiliate.fields.account_status') }}</label>
                    <select class="form-control select2 {{ $errors->has('account_status') ? 'is-invalid' : '' }}" name="account_status" id="account_status">
                            <option value="active" {{ old('account_status') == "active" ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('account_status') == "inactive" ? 'selected' : '' }}>Inactive</option>
                            <option value="suspended" {{ old('account_status') == "suspended" ? 'selected' : '' }}>Suspended</option>
                    </select>
                    @if($errors->has('account_status'))
                        <span class="text-danger">{{ $errors->first('account_status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.affiliate.fields.account_status_helper') }}</span>
                </div>


            <div class="form-group">
                <label for="name">{{ trans('cruds.affiliate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="account_executive_name">{{ trans('cruds.affiliate.fields.account_executive_name') }}</label>
                <input class="form-control {{ $errors->has('account_executive_name') ? 'is-invalid' : '' }}" type="text" name="account_executive_name" id="account_executive_name" value="{{ old('account_executive_name', '') }}">
                @if($errors->has('account_executive_name'))
                    <span class="text-danger">{{ $errors->first('account_executive_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.account_executive_name_helper') }}</span>
            </div>






            {{-- <div class="form-group">
                <label for="logo">{{ trans('cruds.affiliate.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.logo_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="everflow_account">{{ trans('cruds.affiliate.fields.everflow_account') }}</label>
                <input class="form-control {{ $errors->has('everflow_account') ? 'is-invalid' : '' }}" type="text" name="everflow_account" id="everflow_account" value="{{ old('everflow_account', '') }}">
                @if($errors->has('everflow_account'))
                    <span class="text-danger">{{ $errors->first('everflow_account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.everflow_account_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.affiliate.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_manager_name">{{ trans('cruds.affiliate.fields.account_manager_name') }}</label>
                <input class="form-control {{ $errors->has('account_manager_name') ? 'is-invalid' : '' }}" type="text" name="account_manager_name" id="account_manager_name" value="{{ old('account_manager_name', '') }}">
                @if($errors->has('account_manager_name'))
                    <span class="text-danger">{{ $errors->first('account_manager_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.account_manager_name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="balance">{{ trans('cruds.affiliate.fields.balance') }}</label>
                <input class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="number" name="balance" id="balance" value="{{ old('balance', '') }}" step="0.01">
                @if($errors->has('balance'))
                    <span class="text-danger">{{ $errors->first('balance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_login">{{ trans('cruds.affiliate.fields.last_login') }}</label>
                <input class="form-control datetime {{ $errors->has('last_login') ? 'is-invalid' : '' }}" type="text" name="last_login" id="last_login" value="{{ old('last_login') }}">
                @if($errors->has('last_login'))
                    <span class="text-danger">{{ $errors->first('last_login') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.last_login_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_country_code">{{ trans('cruds.affiliate.fields.network_country_code') }}</label>
                <input class="form-control {{ $errors->has('network_country_code') ? 'is-invalid' : '' }}" type="text" name="network_country_code" id="network_country_code" value="{{ old('network_country_code', 'US') }}">
                @if($errors->has('network_country_code'))
                    <span class="text-danger">{{ $errors->first('network_country_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.network_country_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="global_tracking_domain_url">{{ trans('cruds.affiliate.fields.global_tracking_domain_url') }}</label>
                <input class="form-control {{ $errors->has('global_tracking_domain_url') ? 'is-invalid' : '' }}" type="text" name="global_tracking_domain_url" id="global_tracking_domain_url" value="{{ old('global_tracking_domain_url', '') }}">
                @if($errors->has('global_tracking_domain_url'))
                    <span class="text-danger">{{ $errors->first('global_tracking_domain_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.global_tracking_domain_url_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="today_revenue">{{ trans('cruds.affiliate.fields.today_revenue') }}</label>
                <input class="form-control {{ $errors->has('today_revenue') ? 'is-invalid' : '' }}" type="number" name="today_revenue" id="today_revenue" value="{{ old('today_revenue', '0.00') }}" step="0.01">
                @if($errors->has('today_revenue'))
                    <span class="text-danger">{{ $errors->first('today_revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.today_revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_affiliateid">{{ trans('cruds.affiliate.fields.network_affiliateid') }}</label>
                <input class="form-control {{ $errors->has('network_affiliateid') ? 'is-invalid' : '' }}" type="number" name="network_affiliateid" id="network_affiliateid" value="{{ old('network_affiliateid', '') }}" step="1">
                @if($errors->has('network_affiliateid'))
                    <span class="text-danger">{{ $errors->first('network_affiliateid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.network_affiliateid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_executiveid">{{ trans('cruds.affiliate.fields.account_executiveid') }}</label>
                <input class="form-control {{ $errors->has('account_executiveid') ? 'is-invalid' : '' }}" type="number" name="account_executiveid" id="account_executiveid" value="{{ old('account_executiveid', '') }}" step="1">
                @if($errors->has('account_executiveid'))
                    <span class="text-danger">{{ $errors->first('account_executiveid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.account_executiveid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_managerid">{{ trans('cruds.affiliate.fields.account_managerid') }}</label>
                <input class="form-control {{ $errors->has('account_managerid') ? 'is-invalid' : '' }}" type="number" name="account_managerid" id="account_managerid" value="{{ old('account_managerid', '') }}" step="1">
                @if($errors->has('account_managerid'))
                    <span class="text-danger">{{ $errors->first('account_managerid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.account_managerid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="networkid">{{ trans('cruds.affiliate.fields.networkid') }}</label>
                <input class="form-control {{ $errors->has('networkid') ? 'is-invalid' : '' }}" type="number" name="networkid" id="networkid" value="{{ old('networkid', '') }}" step="1">
                @if($errors->has('networkid'))
                    <span class="text-danger">{{ $errors->first('networkid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.networkid_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.affiliates.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 600,
      height: 300
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($affiliate) && $affiliate->logo)
      var file = {!! json_encode($affiliate->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.affiliates.storeMedia') }}',
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
@if(isset($affiliate) && $affiliate->featured_image)
      var file = {!! json_encode($affiliate->featured_image) !!}
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
