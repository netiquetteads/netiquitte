@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.offer.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.offers.index') }}">
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
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.network_offer') }}
                                    </th>
                                    <td>
                                        {{ $offer->network_offer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.network') }}
                                    </th>
                                    <td>
                                        {{ $offer->network }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.optimized_thumbnail_url') }}
                                    </th>
                                    <td>
                                        {{ $offer->optimized_thumbnail_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.thumbnail_url') }}
                                    </th>
                                    <td>
                                        {{ $offer->thumbnail_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.visibility') }}
                                    </th>
                                    <td>
                                        {{ $offer->visibility }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.network_advertiser_name') }}
                                    </th>
                                    <td>
                                        {{ $offer->network_advertiser_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $offer->category }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.network_offer_group') }}
                                    </th>
                                    <td>
                                        {{ $offer->network_offer_group }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.time_created') }}
                                    </th>
                                    <td>
                                        {{ $offer->time_created }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.time_saved') }}
                                    </th>
                                    <td>
                                        {{ $offer->time_saved }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.today_revenue') }}
                                    </th>
                                    <td>
                                        {{ $offer->today_revenue }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.destination_url') }}
                                    </th>
                                    <td>
                                        {{ $offer->destination_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.today_clicks') }}
                                    </th>
                                    <td>
                                        {{ $offer->today_clicks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.revenue_type') }}
                                    </th>
                                    <td>
                                        {{ $offer->revenue_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.payout_type') }}
                                    </th>
                                    <td>
                                        {{ $offer->payout_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.today_payout_amount') }}
                                    </th>
                                    <td>
                                        {{ $offer->today_payout_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.today_revenue_amount') }}
                                    </th>
                                    <td>
                                        {{ $offer->today_revenue_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.payout_amount') }}
                                    </th>
                                    <td>
                                        {{ $offer->payout_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.offer.fields.revenue_amount') }}
                                    </th>
                                    <td>
                                        {{ $offer->revenue_amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.offers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection