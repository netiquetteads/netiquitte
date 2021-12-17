@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.campaign.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.id') }}
                        </th>
                        <td>
                            {{ $campaign->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.name') }}
                        </th>
                        <td>
                            {{ $campaign->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.email_subject') }}
                        </th>
                        <td>
                            {{ $campaign->email_subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.from_email') }}
                        </th>
                        <td>
                            {{ $campaign->from_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.content') }}
                        </th>
                        <td>
                            @php
                                $content = str_replace('{Offer_Here}', '', $campaign->content);
                                $content = str_replace('{Offer_Image}', '',$content);
                            @endphp 
                            {!! $content !!}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.offer_image') }}
                        </th>
                        <td>
                            @if($campaign->offer_image)
                                <a href="{{ $campaign->offer_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $campaign->offer_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.campaign_offer') }}
                        </th>
                        <td>
                            @if ($campaign->campaignOffers->count()>0)
                                {{ implode(', ',$campaign->campaignOffers->pluck('name')->toArray()) }}
                            @endif
                            
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.selected_template') }}
                        </th>
                        <td>
                            {{ $campaign->selected_template->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.sentDateTime') }}
                        </th>
                        <td>
                            {{ date('d M Y h:i:s',strtotime($campaign->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.sentTo') }}
                        </th>
                        <td>
                            {{ $campaign->send_to ?? '' }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.subs') }}
                        </th>
                        <td>
                            {{ $campaign->subs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.unsubs') }}
                        </th>
                        <td>
                            {{ $campaign->unsubs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.opens') }}
                        </th>
                        <td>
                            {{ $campaign->opens }}
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection