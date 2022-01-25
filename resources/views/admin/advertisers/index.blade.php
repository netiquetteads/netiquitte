@extends('layouts.admin')
@section('content')
@can('advertiser_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.advertisers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.advertiser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.advertiser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Advertiser">
            <thead>
                <tr>
                    <th width="10">

                    </th>

                    {{-- <th> {{ trans('cruds.advertiser.fields.id') }} </th>  --}}
                    <th> {{ trans('cruds.advertiser.fields.name') }} </th> 
                    <th> {{ trans('cruds.advertiser.fields.account_status') }} </th> 
                    {{-- <th> {{ trans('cruds.advertiser.fields.everflow_account') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.published') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.platform_url') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.platform_username') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.affiliate_id_macro') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.attribution_method') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.email_attribution_method') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.advertiser.fields.network_advertiserid') }} </th>  --}}
                    <th> &nbsp; </th> </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('advertiser_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.advertisers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

@php
  $slug=Request::segment(3);
  if($slug){
    $url=url('admin/advertiser',$slug);
  }else{
    $url=route('admin.advertisers.index');
  }
@endphp

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ $url }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
// { data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'account_status', name: 'account_status' },
// { data: 'everflow_account', name: 'everflow_account' },
// { data: 'published', name: 'published' },
// { data: 'platform_url', name: 'platform_url' },
// { data: 'platform_username', name: 'platform_username' },
// { data: 'affiliate_id_macro', name: 'affiliate_id_macro' },
// { data: 'attribution_method', name: 'attribution_method' },
// { data: 'email_attribution_method', name: 'email_attribution_method' },
// { data: 'network_advertiserid', name: 'network_advertiserid' },
{ data: 'actions', name: 'actions' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Advertiser').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection