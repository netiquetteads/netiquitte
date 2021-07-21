@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="address_1">{{ trans('cruds.address.fields.address_1') }}</label>
                <input class="form-control {{ $errors->has('address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" value="{{ old('address_1', $address->address_1) }}">
                @if($errors->has('address_1'))
                    <span class="text-danger">{{ $errors->first('address_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.address.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', $address->address_2) }}">
                @if($errors->has('address_2'))
                    <span class="text-danger">{{ $errors->first('address_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $address->city) }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_code">{{ trans('cruds.address.fields.region_code') }}</label>
                <input class="form-control {{ $errors->has('region_code') ? 'is-invalid' : '' }}" type="text" name="region_code" id="region_code" value="{{ old('region_code', $address->region_code) }}">
                @if($errors->has('region_code'))
                    <span class="text-danger">{{ $errors->first('region_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.region_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_code">{{ trans('cruds.address.fields.country_code') }}</label>
                <input class="form-control {{ $errors->has('country_code') ? 'is-invalid' : '' }}" type="text" name="country_code" id="country_code" value="{{ old('country_code', $address->country_code) }}">
                @if($errors->has('country_code'))
                    <span class="text-danger">{{ $errors->first('country_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.country_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip_postal_code">{{ trans('cruds.address.fields.zip_postal_code') }}</label>
                <input class="form-control {{ $errors->has('zip_postal_code') ? 'is-invalid' : '' }}" type="number" name="zip_postal_code" id="zip_postal_code" value="{{ old('zip_postal_code', $address->zip_postal_code) }}" step="1">
                @if($errors->has('zip_postal_code'))
                    <span class="text-danger">{{ $errors->first('zip_postal_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.zip_postal_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="addressid">{{ trans('cruds.address.fields.addressid') }}</label>
                <input class="form-control {{ $errors->has('addressid') ? 'is-invalid' : '' }}" type="number" name="addressid" id="addressid" value="{{ old('addressid', $address->addressid) }}" step="1">
                @if($errors->has('addressid'))
                    <span class="text-danger">{{ $errors->first('addressid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.addressid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="networkid">{{ trans('cruds.address.fields.networkid') }}</label>
                <input class="form-control {{ $errors->has('networkid') ? 'is-invalid' : '' }}" type="number" name="networkid" id="networkid" value="{{ old('networkid', $address->networkid) }}" step="1">
                @if($errors->has('networkid'))
                    <span class="text-danger">{{ $errors->first('networkid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.networkid_helper') }}</span>
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