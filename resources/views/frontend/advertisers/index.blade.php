@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('advertiser_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.advertisers.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Advertiser">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.account_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.everflow_account') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.published') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.platform_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.platform_username') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.affiliate_id_macro') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.attribution_method') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.email_attribution_method') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advertiser.fields.network_advertiserid') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($advertisers as $key => $advertiser)
                                    <tr data-entry-id="{{ $advertiser->id }}">
                                        <td>
                                            {{ $advertiser->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Advertiser::ACCOUNT_STATUS_SELECT[$advertiser->account_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->everflow_account ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $advertiser->published ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $advertiser->published ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $advertiser->platform_url ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->platform_username ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->affiliate_id_macro ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->attribution_method ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->email_attribution_method ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advertiser->network_advertiserid ?? '' }}
                                        </td>
                                        <td>
                                            @can('advertiser_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.advertisers.show', $advertiser->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('advertiser_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.advertisers.edit', $advertiser->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('advertiser_delete')
                                                <form action="{{ route('frontend.advertisers.destroy', $advertiser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('advertiser_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.advertisers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Advertiser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection