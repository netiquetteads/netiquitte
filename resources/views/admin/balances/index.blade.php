<?php
$Year = @$_GET['year'];
if($Year == ""){
	$Year = date('Y');
}
?>
@extends('layouts.admin')
@section('content')

<style>
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
    
    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    .tabstyle {
        display: inline-block;
        font-size: 12px;
        font-weight:bold;
        text-align: center;
        border-radius: 25px 25px 0px 0px;
        background: #e0e0e0;
        padding: 10px; 
        width: 200px;
        height: 30px;
    }
    .manualFilterBox{
        float: right;
    }
    .manualFilterBox .btn-info{
        margin-left: 20px !important;
    }
    .input-group label{
        padding: 0px 10px;
        line-height: 30px;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        border-color: #dee2e6 transparent #dee2e6 #dee2e6;
    }
    </style>
{{-- @can('balance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.balances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.balance.title_singular') }}
            </a>
        </div>
    </div>
@endcan --}}

@include('admin.balances.partials.header-section')

<div class="card">
    <div class="card-header">
        Accounting Overview
        
    </div>

    <div class="card-body">
        {{-- <input type="text" name="daterange" id="daterangepicker"> <br><br> --}}
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Balance" id="balanceTable">
            
        </table>
    </div>
</div>

@endsection

<div id='modalStuff' class="modal">
						
</div>

@section('scripts')
@parent

<script>
 
 $('.input-daterange input').each(function() {
    $(this).datepicker({
        changeMonth:true,
        changeYear:true,
        format:'dd-mm-yyyy',
        // viewMode: 1,
        // minViewMode: 1,
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });
});    
    

$('#CustomManualUpdate').click(function(){

    
    var fromDate=$( "#from" ).val();
        var toDate=$( "#to" ).val();

    // console.log(fromDate,toDate);

                $.ajax({
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('api.balance.manualUpdate') }}?fromDate="+fromDate+"&toDate="+toDate,
                    data: "check",
                    success: function(response){
                        alert(response.message);
                        console.log('response',response);
                    }
                });
});

 </script>

<script>
//     $('#daterangepicker').daterangepicker({
//     "showDropdowns": true,
//     // "startDate": "08/18/2021",
//     // "endDate": "08/24/2021"
//     // minDate: moment().subtract(12, 'years')
    
// }, function(start, end, label) {
//   console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
//   console.log(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));

//     $.ajax({
//         type: "POST",
//         async:true,
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: "{{ route('admin.balances.getTabledata') }}",
//         data: {"Year":{{ $Year }},"start":start.format('YYYY-MM-DD'),"end":end.format('YYYY-MM-DD')},
//         success: function(response){
//             $('#balanceTable').html(response);
//             table = $('.datatable-Balance').DataTable();

//             table.clear().draw();
//             // table.rows.add(NewlyCreatedData); // Add new data
//             table.columns.adjust().draw(); // Redraw the DataTable
//         }
//     });

// });

// $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
//     console.log(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//     //   $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//   });
</script>
<script>
    var modal
        function OpenTab(TabToOpen){
            var tabArray = ["Tab1","Tab2","Tab3","Tab4","Tab5"]; //put all tab names here
            console.log(TabToOpen);
            tabArray.forEach(myFunction);

            function myFunction(item, index) {
              document.getElementById(item).style.display = "none";
            } 
                
            document.getElementById(TabToOpen).style.display = "block";
        }
        function OpenModal(AffiliateID, Year, Month){
            modal = document.getElementById("modalStuff");
            $.ajax({
                type: "POST",
                async:true,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.getModeldata') }}",
                data: {"Year":{{ $Year }},"AffiliateID":AffiliateID,"Month":Month},
                success: function(response){
                    modal.innerHTML = response;
                        //CKEDITOR.disableAutoInline = true;
                        var allEditors = document.querySelectorAll('.ckeditor');
                        for (var i = 0; i < allEditors.length; ++i) {
                            ClassicEditor.create(
                            allEditors[i], {
                            }
                            );
                        }
                }
            });
            
            //SHOW HERE
                
                modal.style.display = "block";
        }
        function CloseModal(){
            modal = document.getElementById("modalStuff");
                modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
        function OverViewEdit(MainDiv,EditDiv){
            var x = document.getElementById(MainDiv);
            var y = document.getElementById(EditDiv);
                if (x.style.display === "none") {
                    x.style.display = "block";
                    y.style.display = "none";
                } else {
                    x.style.display = "none";
                    y.style.display = "block";
                }
        }

        function ShowStatus(x) {
        var x = document.getElementById(x);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function SaveAccounting(Account,Type,Amount,Month,Year){
        var zGI = document.getElementById(Amount).value;
        console.log(zGI);
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.SaveAccounting') }}",
                data: {'account':Account,'type':Type,'amount':zGI,'month':Month,'year':Year},
                success: function(response){
                    alert("Saved!");
                    location.reload();
                }
            });
        }
        function SavePaymentStatus(Year, Month, Account){
            var PaymentStatus = document.getElementById("PaymentStatus").value;
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.SavePaymentStatus') }}",
                data: {'account':Account,'status':PaymentStatus,'month':Month,'year':Year},
                success: function(response){
                    alert("Payment Status Updated!");
                    location.reload();
                }
            });
        }
        
        function PaymentDisplay(AffiliateID){
        var x = document.getElementById("PaymentType").value;
        console.log("------"+x);
        if(x == "WIRE"){
            document.getElementById("PaymentContainer").style.display = "block";
            document.getElementById("PaymentContainer").innerHTML = "<label>Account Name:</label><input id='WireAccountName' class='form-control' type='text'><br><label>Account Number:</label><input type='text' id='WireAccountNumber' class='form-control'><br/><label>Routing Number:</label><input type='text' id='WireAccountRouting' class='form-control'><br/><label>SWIFT:</label><input type='text' id='WireAccountSwift' class='form-control'><br/><button type='button' class='btn btn-success' onclick=\"SavePaymentInfo('"+AffiliateID+"','WIRE');\">Save Payment Information</button>";
        }
        if(x == "ACH"){
            document.getElementById("PaymentContainer").style.display = "block";
            document.getElementById("PaymentContainer").innerHTML = "<label>Account Name:</label><input id='ACHAccountName' class='form-control' type='text'><br><label>Account Number:</label><input type='text' id='ACHAccountNumber' class='form-control'><br/><label>Routing Number:</label><input type='text' id='ACHRoutingNumber' class='form-control'><br/><button type='button' class='btn btn-success' onclick=\"SavePaymentInfo('"+AffiliateID+"','ACH');\">Save Payment Information</button>";
        }
        if(x == "PAYPAL"){
            document.getElementById("PaymentContainer").style.display = "block";
            document.getElementById("PaymentContainer").innerHTML = "<label>Paypal Email:</label><input class='form-control' id='PaypalAccount' type='text'><br><button type='button' class='btn btn-success' onclick=\"SavePaymentInfo('"+AffiliateID+"','PAYPAL');\">Save Payment Information</button>";
        }
    }
    
    function SavePaymentInfo(x,y){
        if(y == "WIRE"){
            
            var WireAccountName = document.getElementById("WireAccountName").value;
            var WireAccountNumber = document.getElementById("WireAccountNumber").value;
            var WireAccountRouting = document.getElementById("WireAccountRouting").value;
            var WireSWIFT = document.getElementById("WireAccountSwift").value;
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.SavePaymentInfo') }}",
                data: {'AffID':x,'WireName':WireAccountName,'WireAccount':WireAccountNumber,'WireRouting':WireAccountRouting,'WireSWIFT':WireSWIFT,'PaymentType':y},
                success: function(response){
                    alert("Updated!");
                    location.reload();
                }
            });
        }
        if(y == "ACH"){
            var ACHAccountName = document.getElementById("ACHAccountName").value;
            var ACHAccountNumber = document.getElementById("ACHAccountNumber").value;
            var ACHRoutingNumber = document.getElementById("ACHRoutingNumber").value;	
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.SavePaymentInfo') }}",
                data: {'AffID':x,'ACHName':ACHAccountName,'ACHAccount':ACHAccountNumber,'ACHRouting':ACHRoutingNumber,'PaymentType':y},
                success: function(response){
                    alert("Updated!");
                    location.reload();
                }
            });
        }
        if(y == "PAYPAL"){
            var PaypalAccount = document.getElementById("PaypalAccount").value;
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('admin.balances.SavePaymentInfo') }}",
                    data: {'AffID':x,'Paypal':PaypalAccount,'PaymentType':y},
                    success: function(response){
                        alert("Updated!");
                        location.reload();
                    }
                });
        }
    }
    
    function SaveNotes(AccountID){
        var Notes = document.getElementById("PublisherNotes").value;
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('admin.balances.SaveNotes') }}",
            data: {'AccountID':AccountID,'notes':Notes},
            success: function(response){
                alert("Note Saved!");
                location.reload();
            }
        });
    }
    </script>

<script>

$(document).ready(function() {
    $.ajax({
    type: "POST",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: "{{ route('admin.balances.getTabledata') }}",
    data: {"Year":{{ $Year }}},
    success: function(response){
        $('#balanceTable').html(response);
        table = $('.datatable-Balance').DataTable( {
				paging: false,
				"order": [[ 1, "desc" ]],
			} );
    }
    });

			
		} );

//     $(function () {
//   let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('balance_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.balances.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
//           return entry.id
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

//   let dtOverrideGlobals = {
//     buttons: dtButtons,
//     processing: true,
//     serverSide: true,
//     retrieve: true,
//     aaSorting: [],
//     ajax: "{{ route('admin.balances.index') }}",
//     columns: [
//       { data: 'placeholder', name: 'placeholder' },
// { data: 'id', name: 'id' },
// { data: 'company_name_company', name: 'company_name.company' },
// { data: 'revenue', name: 'revenue' },
// { data: 'payout', name: 'payout' },
// { data: 'profit', name: 'profit' },
// { data: 'payment_status_name', name: 'payment_status.name' },
// { data: 'payment_method_name', name: 'payment_method.name' },
// { data: 'actions', name: '{{ trans('global.actions') }}' }
//     ],
//     orderCellsTop: true,
//     order: [[ 1, 'desc' ]],
//     pageLength: 100,
//   };
//   let table = $('.datatable-Balance').DataTable(dtOverrideGlobals);
//   $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
//       $($.fn.dataTable.tables(true)).DataTable()
//           .columns.adjust();
//   });
  
// });

</script>
@endsection