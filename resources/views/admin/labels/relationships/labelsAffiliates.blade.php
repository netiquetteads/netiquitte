<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-labelsAffiliates">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.logo') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.company') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.account_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.users') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.created_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.everflow_account') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.published') }}
                            </th>
                            <th>
                                {{ trans('cruds.affiliate.fields.labels') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($affiliates as $key => $affiliate)
                            <tr data-entry-id="{{ $affiliate->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $affiliate->id ?? '' }}
                                </td>
                                <td>
                                    @if($affiliate->logo)
                                        <a href="{{ $affiliate->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $affiliate->logo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $affiliate->company ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Affiliate::ACCOUNT_STATUS_SELECT[$affiliate->account_status] ?? '' }}
                                </td>
                                <td>
                                    @foreach($affiliate->users as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $affiliate->created_at ?? '' }}
                                </td>
                                <td>
                                    {{ $affiliate->everflow_account ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $affiliate->published ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $affiliate->published ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @foreach($affiliate->labels as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('affiliate_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.affiliates.show', $affiliate->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('affiliate_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.affiliates.edit', $affiliate->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('affiliate_delete')
                                        <form action="{{ route('admin.affiliates.destroy', $affiliate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('affiliate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.affiliates.massDestroy') }}",
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
  let table = $('.datatable-labelsAffiliates:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection