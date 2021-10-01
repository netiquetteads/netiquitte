@extends('layouts.admin')
@section('content')
<style>
    .dt-buttons{
      display: none;
    }
    table.dataTable tbody td.select-checkbox::before, table.dataTable tbody td.select-checkbox::after, table.dataTable tbody th.select-checkbox::before, table.dataTable tbody th.select-checkbox::after {
    display: none;
}
  </style>
@can('campaign_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.campaigns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.campaign.title_singular') }}
            </a>
            <button class="btn btn-danger" id="deleteAll" disabled>Delete</button>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.campaign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Campaign">
            <thead>
                <tr>
                  <th width="10">
                    <input type="checkbox" name="selectall" id="selectall">
                </th>
                    <th>
                        {{ trans('cruds.campaign.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.email_subject') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.campaign.fields.campaign_offer') }}
                    </th> --}}
                    <th>
                        {{ trans('cruds.campaign.fields.sentDateTime') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.campaign.fields.subs') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.opens') }}
                    </th> --}}
                    <th class="text-center">
                      {{ trans('global.actions') }}
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
@can('campaign_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.campaigns.massDestroy') }}",
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.campaigns.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email_subject', name: 'email_subject' },
// { data: 'campaign_offer_name', name: 'campaign_offer.name' },
{ data: 'sentDateTime', name: 'sentDateTime' },
// { data: 'subs', name: 'subs' },
// { data: 'opens', name: 'opens' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    "createdRow": function( row, data, dataIndex ) {

// Add a class to the cell in the second column
$(row).children(':nth-child(7)').addClass('text-center');
}
  };
  let table = $('.datatable-Campaign').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>


<script>
  $(document).ready(function(){
      $('#selectall').change(function(e){
          e.preventDefault();
          if($(this).prop('checked')==true){
              $('input[name=selectdata]:checkbox').prop('checked',true);
              $('#deleteAll').prop('disabled',false);
          }else{
              $('input[name=selectdata]:checkbox').prop('checked',false);
              $('#deleteAll').prop('disabled',true);
          }
      })
  });

  $(document.body).on('change', 'input[name=selectdata]' ,function(e){
      e.preventDefault();
      var val = [];
      $('input[name=selectdata]:checkbox:checked').each(function(i){
        val[i] = $(this).val();
      });

      if (val.length>0) {
          $('#deleteAll').prop('disabled',false);
      } else {
          $('#deleteAll').prop('disabled',true);
      }
  });

  $(document.body).on('click', '#deleteAll' ,function(e){
      e.preventDefault();
      var val = [];
      $('input[name=selectdata]:checkbox:checked').each(function(i){
        val[i] = $(this).val();
      });

      if (confirm("Are you sure you want to delete?")) {
          var _token = $('input[name="_token"]').val();
                  $.ajax({
                      url: "{{ route('admin.campaigns.deleteSelectedEmails') }}",
                      method: "POST",
                      data: {
                          ids: val,
                          _token: _token
                      },
                      success: function(response) {
                          location.reload();
                      }
                  })
      }

  });
</script>
@endsection