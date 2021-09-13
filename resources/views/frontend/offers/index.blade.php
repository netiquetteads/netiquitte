@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('offer_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.offers.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Offer">
                            <thead>
                                <tr>
                                    <th>
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
                                    </th>
                                    <th>
                                        {{ trans('cruds.offer.fields.affiliate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.offer.fields.today_clicks') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.offer.fields.payout_amount') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offers as $key => $offer)
                                    <tr data-entry-id="{{ $offer->id }}">
                                        <td>
                                            {{ $offer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Offer::SOURCE_SELECT[$offer->source] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->payout ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->revenue ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Offer::OFFER_STATUS_SELECT[$offer->offer_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->margin ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->affiliate->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->today_clicks ?? '' }}
                                        </td>
                                        <td>
                                            {{ $offer->payout_amount ?? '' }}
                                        </td>
                                        <td>
                                            @can('offer_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.offers.show', $offer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('offer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.offers.edit', $offer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('offer_delete')
                                                <form action="{{ route('frontend.offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('offer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.offers.massDestroy') }}",
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
  let table = $('.datatable-Offer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection