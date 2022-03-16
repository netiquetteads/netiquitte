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
                Send {{ trans('cruds.campaign.title_singular') }}
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
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Campaign">
            <thead>
                <tr>
                    <th></th>
                  <th width="10">
                    <input type="checkbox" name="selectall" id="selectall">
                </th>
                {{-- <th width="10">
                     
                </th> --}}
                    <th>
                        {{ trans('cruds.campaign.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.name') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.campaign.fields.email_subject') }}
                    </th> --}}
                    {{-- <th>
                        {{ trans('cruds.campaign.fields.campaign_offer') }}
                    </th> --}}
                    <th>
                        {{ trans('cruds.campaign.fields.sent_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.sentTo') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.stats') }}
                    </th>
                    {{-- <th>
                        {{ trans('cruds.campaign.fields.unopened') }}
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

    //
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );
 
    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;
 
    return function ( request, drawCallback, settings ) {
        var ajax          = false;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;
         
        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }
         
        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );
 
        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));
 
                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }
             
            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);
 
            request.start = requestStart;
            request.length = requestLength*conf.pages;
 
            // Provide the same `data` options as DataTables.
            if ( typeof conf.data === 'function' ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }
 
            return $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    false,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);
 
                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    if ( requestLength >= -1 ) {
                        json.data.splice( requestLength, json.data.length );
                    }
                     
                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );
 
            drawCallback(json);
        }
    }
};
 
// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );


   /* Formatting function for row details - modify as you need */
function format ( d ) {
    console.log('tabeldata',d);
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; min-width:600px;" >'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.email_subject') }}:</th>'+
            '<td>'+d.email_subject+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.list') }}:</th>'+
            '<td>'+d.send_to+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.email_sent') }}:</th>'+
            '<td>'+d.temp_emails.length+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.opens') }}:</th>'+
            '<td>'+d.opens+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.unopened') }}:</th>'+
            '<td>'+d.unopened+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.sent_date') }}:</th>'+
            '<td>'+d.sent_date+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>{{ trans('cruds.campaign.fields.sent_time') }}:</th>'+
            '<td>'+d.sent_time+'</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    // Add event listener for opening and closing details
    $('.datatable-Campaign').on('click', 'tbody td.dt-control', function () {
        var tr = $(this).closest('tr');
        console.log('tr',tr);
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
        }
    } );
 
    $('.datatable-Campaign').on('requestChild.dt', function(e, row) {
        row.child(format(row.data())).show();
    })
 
    var table = $('.datatable-Campaign').DataTable( {
        "ajax": $.fn.dataTable.pipeline( {
            url: "{{ route('admin.campaigns.index') }}",
            pages: 5 // number of pages to cache
         } ),
         "processing": true,
        "serverSide": true,
        "rowId": 'id',
        "stateSave": true,
        "columns": [
            {
                "className":      'dt-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "placeholder","orderable":      false  },
            { "data": "id" },
            { "data": "name" },
            // { "data": "email_subject" },
            { "data": "sentDateTime" },
            { "data": "send_to" },
            { "data": "stats" },
            // { "data": "unopened" },
            { "data": "actions" }
        ],
        "order": [[1, 'asc']]
    } );
} );

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