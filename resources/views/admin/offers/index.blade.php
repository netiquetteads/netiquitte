@extends('layouts.admin')
@section('content')
@can('offer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.offers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.offer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.offer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Offer">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    {{-- <th> {{ trans('cruds.offer.fields.id') }} </th>  --}}
                    <th> {{ trans('cruds.offer.fields.name') }} </th> 
                    {{-- <th> {{ trans('cruds.offer.fields.source') }} </th>  --}}
                    <th> {{ trans('cruds.offer.fields.payout') }} </th> 
                    <th> {{ trans('cruds.offer.fields.revenue') }} </th> 
                    <th> {{ trans('cruds.offer.fields.offer_status') }} </th> 
                    <th> {{ trans('cruds.offer.fields.margin') }} </th> 
                    {{--  <th> {{ trans('cruds.offer.fields.affiliate') }} </th> 
                    <th> {{ trans('cruds.offer.fields.today_clicks') }} </th> 
                    <th> {{ trans('cruds.offer.fields.payout_amount') }} </th>   --}}
                    {{--  <th>
                        {{ trans('cruds.offer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.source') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.payout') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.revenue') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.offer_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.offer.fields.margin') }}
                    </th>  --}}
                    <th>
                        &nbsp;
                    </th>
                </tr>
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
@can('offer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.offers.massDestroy') }}",
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
    $url=url('admin/offer',$slug);
  }else{
    $url=route('admin.offers.index');
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
// { data: 'source', name: 'source' },
{ data: 'payout', name: 'payout' },
{ data: 'revenue', name: 'revenue' },
{ data: 'offer_status', name: 'offer_status' },
{ data: 'margin', name: 'margin' },
{ data: 'actions', name: 'actions' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Offer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection