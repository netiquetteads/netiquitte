@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.offer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.id') }}
                        </th>
                        <td>
                            {{ $offer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.name') }}
                        </th>
                        <td>
                            {{ $offer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.preview_url') }}
                        </th>
                        <td>
                            {{ $offer->preview_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.source') }}
                        </th>
                        <td>
                            {{ App\Models\Offer::SOURCE_SELECT[$offer->source] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.payout') }}
                        </th>
                        <td>
                            {{ $offer->payout }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.revenue') }}
                        </th>
                        <td>
                            {{ $offer->revenue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.offer_status') }}
                        </th>
                        <td>
                            {{ App\Models\Offer::OFFER_STATUS_SELECT[$offer->offer_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.margin') }}
                        </th>
                        <td>
                            {{ $offer->margin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offer.fields.affiliate') }}
                        </th>
                        <td>
                            {{ $offer->affiliate->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection