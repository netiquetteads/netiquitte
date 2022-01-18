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
@can('template_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.templates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.template.title_singular') }}
            </a>
            <button class="btn btn-danger" id="deleteAll" disabled>Delete</button>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.template.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Template">
            <thead>
                <tr>
                    <th width="10">
                        <input type="checkbox" name="selectall" id="selectall">
                    </th>
                    <th>
                        {{ trans('cruds.template.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.template.fields.name') }}
                    </th>
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
  let dtOverrideGlobals = {
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.templates.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder', orderable:false },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    "createdRow": function( row, data, dataIndex ) {

// Add a class to the cell in the second column
$(row).children(':nth-child(4)').addClass('text-center');
}
  };
  let table = $('.datatable-Template').DataTable(dtOverrideGlobals);
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
                        url: "{{ route('admin.templates.deleteSelectedTemplate') }}",
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