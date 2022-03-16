@extends('layouts.admin')

@section('styles')

    <style>
        .dt-buttons{
            display: none;
        }
        table.dataTable tbody td.select-checkbox:before,table.dataTable tbody td.select-checkbox:after{
            display: none;
        }
        table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected {
        background-color: transparent;
        }
        table.dataTable tbody tr {
            background-color: transparent;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: transparent;
        }
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
        .modal-lg {
        max-width: 1050px;
        }
        .card-title {
            margin-bottom: 20px !important;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057 !important;
}
#paymentList .dropdown-menu li{
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}
#paymentList .dropdown-menu{
    padding: 0;
}
    </style>
@endsection

@php
    $getstart = @$_GET['start'];
    $getend = @$_GET['end'];

    if ($getstart && $getend) {
        $start = date('m/d/Y',strtotime($getstart));
        $end = date('m/d/Y',strtotime($getend));
    } else {
        $start = date('01/01/Y');
        $end = date('m/d/Y');
    }
    // dd($start,$end);
    // $start = date('01/01/2020');
    // $end = date('01/01/2021');
@endphp

@section('content')

@include('admin.balances.partials.header-section')

<div class="card">
    <div class="card-header">
        Accounting Overview

    </div>

    <div class="card-body">
        {{-- <input type="text" name="daterange" id="daterangepicker"> <br><br> --}}
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Balance" id="balanceTable">

        </table>
    </div>
</div>

@endsection

<div id='modalStuff' class="modal">

</div>

@include('admin.balances.partials.create-method-modal')

@section('scripts')
@parent

<script>

$(document).ready(function(){

    $(document).on('click', '#submitMethodType' ,function (e) {
        var methodTypeFormData=$('#methodTypeForm').serialize();
        
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.payment-method-type.createNewMethod') }}",
            data: methodTypeFormData,
            success: function(response){
                $('#payment_method').html(response);
                $('#createMethodModal').modal('hide');
                $('#methodTypeForm')[0].reset();
            }
        });

    });

    $(document).on('change', '#payment_method' ,function (e) {
        var id = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.payment-method-type.getPaymentFields') }}",
            data: {id:id,_token:_token},
            success: function(response){
                $('#add_fields').html(response);
            }
        });
    });

    $(document).on('click', '#SavePaymentInfo' ,function (e) {
        var paymentMethodFormData=$('#paymentMethodForm').serialize();

        var id=$('#paymentMethodId').val();
        if (id) {
            var url="{{ url('') }}/api/v1/payment-methods/"+id;
            var type='PUT';
        } else {
            var url="{{ route('api.payment-methods.store') }}";
            var type='POST';
        }
        
        $.ajax({
            type: type,
            url: url,
            data: paymentMethodFormData,
            success: function(response){
                location.reload();
            }
        });
    });
    
    // $(document).on('change', '.selectFields input[type="checkbox"]' ,function (e) {
    //     if(this.checked) {
            
    //         if(this.value==1){
    //             $('#name_div').show();
    //         }
    //         if(this.value==3){
    //             $('#account_name_div').show();
    //         }
    //         if(this.value==4){
    //             $('#account_number_div').show();
    //         }
    //         if(this.value==5){
    //             $('#routing_number_div').show();
    //         }
    //         if(this.value==6){
    //             $('#explanation_div').show();
    //         }
    //         if(this.value==7){
    //             $('#custom_email_div').show();
    //         }
    //         if(this.value==8){
    //             $('#swift_div').show();
    //         }
    //         if(this.value==9){
    //             $('#paypal_email_div').show();
    //         }
            
    //     }else{
    //         if(this.value==1){
    //             $('#name_div').hide();
    //         }
    //         if(this.value==3){
    //             $('#account_name_div').hide();
    //         }
    //         if(this.value==4){
    //             $('#account_number_div').hide();
    //         }
    //         if(this.value==5){
    //             $('#routing_number_div').hide();
    //         }
    //         if(this.value==6){
    //             $('#explanation_div').hide();
    //         }
    //         if(this.value==7){
    //             $('#custom_email_div').hide();
    //         }
    //         if(this.value==8){
    //             $('#swift_div').hide();
    //         }
    //         if(this.value==9){
    //             $('#paypal_email_div').hide();
    //         }
            
    //     }
    // });


//     $(document).on('keyup', '#payment_method' ,function (e) {
//        var query = $(this).val();
//        var affiliate_id = $('#AffiliateID').val();
//        if(query != '')
//        {
//         var _token = $('input[name="_token"]').val();
//         $.ajax({
//          url:"",
//          method:"POST",
//          data:{query:query,affiliate_id:affiliate_id, _token:_token},
//          success:function(data){
//           $('#paymentList').fadeIn();  
//           $('#paymentList').html(data);
//          }
//         });
//        }else{
//         $('#paymentList').fadeOut();
//         $('#paymentMethodTypeId').val('');
//        }
//    });

//    $(document).on('click', '#paymentList ul li.auto', function(){  
//        $('#payment_method').val($(this).text());
//        $('#paymentMethodTypeId').val($(this).attr('id'));
//        $('#paymentList').fadeOut();
//    });

//    $(document).on('click', '#paymentList ul li.add', function(){ 
       
//        var name = $(this).find('span').text();
//        $('#payment_method').val(name);  
//        $('#paymentList').fadeOut();

//        $.ajax({
//         type: "POST",
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: "{{ route('api.payment-method-type.store') }}",
//         data: {name:name},
//         success: function(response){
//             $('#paymentMethodTypeId').val(response.data.id);
//         }
//     });

//    });  

});

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
    $this=$(this);
    $loader='<div class="spinner-border text-dark" role="status">'+
            '<span class="sr-only">Loading...</span>'+
            '</div>';
    $this.html($loader);

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
            $this.html('Update');
            location.reload();
        }
    });
});

 </script>

<script>
    $('#clearFilter').click(function(){
        window.location.href = "{{ url('admin/balances') }}";
    });


    $('#daterangepicker').daterangepicker({
    "showDropdowns": true,
    "linkedCalendars": false,
    "startDate": '{{ $start }}',
    "endDate": '{{ $end }}'
    // "startDate": moment().startOf('month'),
    // "endDate": moment()
    // minDate: moment().subtract(12, 'years')

}, function(start, end, label) {
  console.log(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));

  window.location.href = "{{ url('admin/balances') }}?start="+start.format('YYYY-MM-DD')+"&end="+end.format('YYYY-MM-DD');

    // $.ajax({
    //     type: "POST",
    //     async:true,
    //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //     url: "{{ route('admin.balances.getTabledata') }}",
    //     data: {"start":start.format('YYYY-MM-DD'),"end":end.format('YYYY-MM-DD')},
    //     success: function(response){
    //         $('#balanceTable').html(response);
    //         table = $('.datatable-Balance').DataTable();

    //         table.clear().draw();
    //         // table.rows.add(NewlyCreatedData); // Add new data
    //         table.columns.adjust().draw(); // Redraw the DataTable
    //     }
    // });

});

$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
    console.log(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    //   $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

    window.location.href = "{{ url('admin/balances') }}?start="+picker.startDate.format('YYYY-MM-DD')+"&end="+picker.endDate.format('YYYY-MM-DD');

    // $.ajax({
    //     type: "POST",
    //     async:true,
    //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //     url: "{{ route('admin.balances.getTabledata') }}",
    //     data: {"start":picker.startDate.format('YYYY-MM-DD'),"end":picker.endDate.format('YYYY-MM-DD')},
    //     success: function(response){
    //         $('#balanceTable').html(response);
    //         table = $('.datatable-Balance').DataTable();

    //         table.clear().draw();
    //         // table.rows.add(NewlyCreatedData); // Add new data
    //         table.columns.adjust().draw(); // Redraw the DataTable
    //     }
    // });

  });
</script>
<script>
    var modal
    let theEditor;
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
            var total=$('#totalAmount'+AffiliateID).data('order');
            $.ajax({
                type: "POST",
                async:true,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.balances.getModeldata') }}",
                data: {"Year":Year,"AffiliateID":AffiliateID,"Month":Month,total:total},
                success: function(response){
                    modal.innerHTML = response;
                        //CKEDITOR.disableAutoInline = true;
                        var allEditors = document.querySelectorAll('.ckeditor');
                        for (var i = 0; i < allEditors.length; ++i) {
                            ClassicEditor.create(
                            allEditors[i], {
                            }
                            ).then( editor => {
                                theEditor = editor; // Save for later use.
                            } );
                        }
                        $('.select2').select2();
                }
            });



            //SHOW HERE

                modal.style.display = "block";
        }
        function getDataFromTheEditor() {
                return theEditor.getData();
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
    data: {'start':'{{ $start }}','end':'{{ $end }}'},
    success: function(response){
        $('#balanceTable').html(response);
        table = $('.datatable-Balance').DataTable( {
				paging: false,
				"order": [[ 1, "desc" ]],
			} );
    }
    });

    $(document.body).on('click', '.sendInvoiceMail' ,function(){

        $this=$(this);
        $loader='<div class="spinner-border text-dark" role="status">'+
            '<span class="sr-only">Loading...</span>'+
            '</div>';
        $this.html($loader);

        var aid=$(this).attr('aid');
        var bid=$(this).attr('bid');

        var invoiceData=getDataFromTheEditor();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('admin.balances.sendInvoiceMail') }}",
            data: {"aid":aid,invoiceData:invoiceData},
            success: function(response){
                $this.html('Send Email');
                alert("Successfully sent invoice mail!");
                location.reload();
            }
        });

    });

});



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
