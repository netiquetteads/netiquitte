@extends('layouts.admin')
@section('content')
@can('affiliate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.affiliates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.affiliate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.affiliate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Affiliate">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    {{-- <th> {{ trans('cruds.affiliate.fields.id') }} </th>  --}}
                    <th> {{ trans('cruds.affiliate.fields.account_status') }} </th> 
                    {{-- <th> {{ trans('cruds.affiliate.fields.logo') }} </th>  --}}
                    <th> {{ trans('cruds.affiliate.fields.name') }} </th> 
                    {{-- <th> {{ trans('cruds.affiliate.fields.everflow_account') }} </th>  --}}
                    {{-- <th> {{ trans('cruds.affiliate.fields.published') }} </th>  --}}
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
@can('affiliate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.affiliates.massDestroy') }}",
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
    $url=url('admin/affiliate',$slug);
  }else{
    $url=route('admin.affiliates.index');
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
{ data: 'account_status', name: 'account_status' },
// { data: 'logo', name: 'logo', sortable: false, searchable: false },
{ data: 'name', name: 'name' },
// { data: 'everflow_account', name: 'everflow_account' },
// { data: 'published', name: 'published' },
{ data: 'actions', name: 'actions' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Affiliate').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection