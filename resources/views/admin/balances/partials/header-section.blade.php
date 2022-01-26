
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <font class="h3 mb-0 text-gray-800">Accounting</font>
    {{-- <font class="h3 mb-0 text-gray-800">Accounting ({{ $Year }}) &nbsp; <i class="fa fa-edit" aria-hidden="true" onclick="YearDropDown();"></i></font><br/>
        <div id="YearDropdown" style="align:left; display:none;">
        <select id="ViewYear" class="form-control">
            {{-- <option value='{{ $Year }}'>{{ $Year }}</option> --}}
            {{-- @foreach ($accountingYears as $YearToView)
                <option value='{{ $YearToView }}'>{{ $YearToView }}</option>
            @endforeach
        </select>
        &nbsp;
        <button class='btn btn-success' onclick="ChangeYearView();">Change Year</button> --}}
        <script>
            // function ChangeYearView(){
            //     var YTC = document.getElementById("ViewYear").value;
                
            //     window.location.replace("{{ url('admin/balances') }}?year="+YTC);
            // }
            // function YearDropDown(){
            //     var x = document.getElementById("YearDropdown");
            //     if (x.style.display === "none") {
            //         x.style.display = "block";
            //     } else {
            //         x.style.display = "none";
            //     }
            //   }
        </script>
        {{-- </div> --}}
    </div>
    <div class="manualFilterBox">
        {{-- <div class="input-group input-daterange">
            <input type="text" id="from" autocomplete="off">
            <label for="to">to</label>
            <input type="text" id="to" autocomplete="off">
            <button class="btn btn-info" id="CustomManualUpdate">Update</button>
        </div> --}}
        <input type="text" name="daterange" id="daterangepicker">

        <button id="clearFilter">Clear Filter</button>
    </div>
    {{--  <input type="text" id="manualUpdatePicker" autocomplete="off">  --}}
{{--  <label for="from">From</label>
<input type="text" id="from" name="from" autocomplete="off">
<label for="to">to</label>
<input type="text" id="to" name="to" autocomplete="off">  --}}



    {{-- <div id="ManualLoader" style="float:right;">
        <button onclick="ShowUpdaterBox(); "class="btn btn-success">Manual Update</button>
    </div> --}}
    <div id="ManualOptions" style="display:none">
        <select class="form-control" onchange="ShowUpdater();" id="InfoToUpdate">
            <option>Please Select</option>
            <option value='1'>Update Current Month</option>
            <option value='2'>Update Previous Month</option>
            <option value='3'>Update Year</option>
            <option value='4'>Update Other Month</option>
        </select>
    </div>
    <!------------------------------------>
    <div id="Option1" style="display:none">
        <button onclick="UpdateAccounting('<?php echo date("Y");?>','<?php echo date("m");?>','Opt1','Option1'); "class="btn btn-success">Confirm Update Current Month</button>
    </div>
    
    <div id="Option2" style="display:none">
        <button onclick="UpdateAccounting('<?php echo date("Y");?>','<?php echo date("m", strtotime("-1 month"));?>','Opt2','Option2'); "class="btn btn-success">Confirm Update Previous Month</button>
    </div>
    
    <div id="Option3" style="display:none">
        <select id="YearToUpdate" class="form-control">
            <option value='2021'>2021</option>
            <option value='2020'>2020</option>
            <option value='2019'>2019</option>
            <option value='2018'>2018</option>
            <option value='2017'>2017</option>
            <option value='2016'>2016</option>
            <option value='2015'>2015</option>
        </select><br/>
        <button onclick="UpdateAccounting('','','Opt3','Option3'); "class="btn btn-success">Confirm Update</button>
    </div>
    
    <div id="Option4" style="display:none">
        <select id="YearOpt4" class="form-control">
            <option value='2021'>2021</option>
            <option value='2020'>2020</option>
            <option value='2019'>2019</option>
            <option value='2018'>2018</option>
            <option value='2017'>2017</option>
            <option value='2016'>2016</option>
            <option value='2015'>2015</option>
        </select>
        
        <select id="MonthOpt4" class="form-control">
            <option value='01'>January</option>
            <option value='02'>February</option>
            <option value='03'>March</option>
            <option value='04'>April</option>
            <option value='05'>May</option>
            <option value='06'>June</option>
            <option value='07'>July</option>
            <option value='08'>August</option>
            <option value='09'>September</option>
            <option value='10'>October</option>
            <option value='11'>November</option>
            <option value='12'>December</option>
        </select>
    <button onclick="UpdateAccounting('','','Opt4','Option4'); "class="btn btn-success">Confirm Update</button>
    </div>
    
    <script>
        
        function UpdateAccounting(Year,Month,Selection, MyBox){
            document.getElementById(MyBox).style.display = "none";
            document.getElementById("ManualLoaderProcessing").style.display = "block";
            if(Selection == "Opt1"){
                console.log("Year: "+Year + " Month: "+Month);
                $.ajax({
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('api.balance.Accounting') }}?Year="+Year+"&Month="+Month,
                    data: "check",
                    success: function(response){
                        document.getElementById("ManualLoaderProcessing").style.display = "none";
                        document.getElementById("ManualLoaderDone").style.display = "block";
                        //location.reload();
                    }
                });
            }
            
            if(Selection == "Opt2"){
                console.log("Year: "+Year+" Month: "+Month);
                $.ajax({
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('api.balance.Accounting') }}?Year="+Year+"&Month="+Month,
                    data: "check",
                    success: function(response){
                        document.getElementById("ManualLoaderProcessing").style.display = "none";
                        document.getElementById("ManualLoaderDone").style.display = "block";
                        //location.reload();
                    }
                });
            }

            if(Selection == "Opt3"){
                Year = document.getElementById("YearToUpdate").value;
                console.log(Year);
                $.ajax({
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('api.balance.AccountingYTD') }}?Year="+Year,
                    data: "check",
                    success: function(response){
                        console.log('response',response);
                        document.getElementById("ManualLoaderProcessing").style.display = "none";
                        document.getElementById("ManualLoaderDone").style.display = "block";
                        //location.reload();
                    }
                });
            }
            
            if(Selection == "Opt4"){
                Year = document.getElementById("YearOpt4").value;
                Month = document.getElementById("MonthOpt4").value;
                console.log("Opt4: " + Year + " Month: " + Month);
                
                $.ajax({
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('api.balance.Accounting') }}?Year="+Year+"&Month="+Month,
                    data: "check",
                    success: function(response){
                        document.getElementById("ManualLoaderProcessing").style.display = "none";
                        document.getElementById("ManualLoaderDone").style.display = "block";
                        //location.reload();
                    }
                });
            }
        }
        function ShowUpdater(){
            x = document.getElementById("InfoToUpdate").value;
            
            if(x == "1"){
                console.log("Opt 1 chosen");
                document.getElementById("Option1").style.display = "block";
                document.getElementById("Option2").style.display = "none";
                document.getElementById("Option3").style.display = "none";
                document.getElementById("Option4").style.display = "none";
            }
            
            if(x == "2"){
                console.log("Opt 2 chosen");
                document.getElementById("Option1").style.display = "none";
                document.getElementById("Option2").style.display = "block";
                document.getElementById("Option3").style.display = "none";
                document.getElementById("Option4").style.display = "none";
            }
            
            if(x == "3"){
                console.log("Opt 3 chosen");
                document.getElementById("Option1").style.display = "none";
                document.getElementById("Option2").style.display = "none";
                document.getElementById("Option3").style.display = "block";
                document.getElementById("Option4").style.display = "none";
            }
            
            if(x == "4"){
                console.log("Opt 4 chosen");
                document.getElementById("Option1").style.display = "none";
                document.getElementById("Option2").style.display = "none";
                document.getElementById("Option3").style.display = "none";
                document.getElementById("Option4").style.display = "block";
            }

        }
    </script>

    <div id="ManualLoaderProcessing" style="float:right; display:none;">
        Please Wait
        <div class="loader"></div>
    </div>
    <div id="ManualLoaderDone" style="float:right; display:none;">
        Manual Update Complete
    </div>
    <style>
        .loader {
          border: 8px solid #f3f3f3; /* Light grey */
          border-top: 8px solid #3498db; /* Blue */
          border-radius: 50%;
          width: 60px;
          height: 60px;
          animation: spin 2s linear infinite;
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
    </style>
    <script>
    function YearlyUpdateF(){
        var x = document.getElementById("ManualLoader");
        var x2 = document.getElementById("ManualLoaderProcessing");
        var x3 = document.getElementById("ManualLoaderDone");
        var YTU = document.getElementById("YearToUpdate").value;
        x.style.display = "none";
        x2.style.display = "block";

        $.ajax({
            type: "GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('api.balance.AccountingYTD') }}?Year="+YTU,
            data: "check",
            success: function(response){
                x2.style.display = "none";
                x3.style.display = "block";
                //location.reload();
            }
        });
    }
    
    function ShowUpdaterBox(){
        document.getElementById("ManualOptions").style.display = "block";
        document.getElementById("ManualLoader").style.display = "none";
    }
    function ManualUpdate(){
        alert(5);
        var x = document.getElementById("ManualLoader");
        var x2 = document.getElementById("ManualLoaderProcessing");
        var x3 = document.getElementById("ManualLoaderDone");
        x.style.display = "none";
        x2.style.display = "block";

        $.ajax({
            type: "GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('api.balance.Accounting') }}",
            data: "check",
            success: function(response){
                x2.style.display = "none";
                x3.style.display = "block";
                //location.reload();
            }
        });
    }
    </script>
  </div>