@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.campaign.title') }}
    </div>

    

    <div class="card-body">
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-overview-tab" data-toggle="pill" href="#custom-tabs-four-overview" role="tab" aria-controls="custom-tabs-four-overview" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-reporting-tab" data-toggle="pill" href="#custom-tabs-four-reporting" role="tab" aria-controls="custom-tabs-four-reporting" aria-selected="false">Reporting</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-email-preview-tab" data-toggle="pill" href="#custom-tabs-four-email-preview" role="tab" aria-controls="custom-tabs-four-email-preview" aria-selected="false">Email Preview</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-overview" role="tabpanel" aria-labelledby="custom-tabs-four-overview-tab">
                   
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
                            {{ trans('cruds.campaign.fields.email_sent') }}
                        </th>
                        <td>
                            {{ $campaign->tempEmails->count() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.opens') }}
                        </th>
                        <td>
                            {{ $campaign->tempEmails->where('email_opened','opened')->count() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.unopened') }}
                        </th>
                        <td>
                            {{ $campaign->tempEmails->where('email_opened','')->count() }}
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
                            {{ trans('cruds.campaign.fields.sent_date') }}
                        </th>
                        <td>
                            {{ date('d M Y',strtotime($campaign->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.sent_time') }}
                        </th>
                        <td>
                            {{ date('h:i:s a',strtotime($campaign->created_at)) }}
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
                </tbody>
            </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-reporting" role="tabpanel" aria-labelledby="custom-tabs-four-reporting-tab">

                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-four-opened-tab" data-toggle="pill" href="#custom-tabs-four-opened" role="tab" aria-controls="custom-tabs-four-opened" aria-selected="true">Opened Email <b>({{ $campaign->tempEmails->where('email_opened','opened')->count() }})</b></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-four-unopened-tab" data-toggle="pill" href="#custom-tabs-four-unopened" role="tab" aria-controls="custom-tabs-four-unopened" aria-selected="false">Unopened Email <b> ({{ $campaign->tempEmails->where('email_opened','!=','opened')->count() }})</b></a>
                        </li>
                      </ul>
                      
                      <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-opened" role="tabpanel" aria-labelledby="custom-tabs-four-opened-tab">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>S.No</th>
                                    <th>Email Address</th>
                                    <th>Open Date</th>
                                    <th>Open Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($campaign->tempEmails->count()>0)
                                    @php
                                        $j=1;
                                    @endphp
                                        @foreach ($campaign->tempEmails->where('email_opened','opened') as $key => $item)
                                        <tr>
                                            <td>{{ $j++ }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ date('M d Y',strtotime($item->email_open_date)) }}</td>
                                            <td>{{ $item->email_open_time }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="custom-tabs-four-unopened" role="tabpanel" aria-labelledby="custom-tabs-four-unopened-tab">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>S.No</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($campaign->tempEmails->count()>0)
                                    @php
                                        $i=1;
                                    @endphp
                                        @foreach ($campaign->tempEmails->where('email_opened','!=','opened') as $unitem)
                                        <tr> 
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $unitem->email }}</td>
                                            <td>{{ $unitem->email_status }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                      </div>

                            
                    
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-email-preview" role="tabpanel" aria-labelledby="custom-tabs-four-email-preview-tab">
                    @php
                        $content = str_replace('{Offer_Here}', '', $campaign->content);
                        $content = str_replace('{Offer_Image}', '',$content);
                    @endphp 
                    {!! $content !!}
                </div>
               
              </div>
            </div>
            
    </div>
</div>



@endsection