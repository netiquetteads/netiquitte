<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBalanceRequest;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Models\Balance;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\BalanceContainer;
use App\Models\Affiliate;
use DateTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\SendInvoiceMail;

class BalancesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('balance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // if ($request->ajax()) {
        //     $query = Balance::with(['payment_method', 'payment_status'])->select(sprintf('%s.*', (new Balance())->table));
        //     $table = Datatables::of($query);

        //     $table->addColumn('placeholder', '&nbsp;');
        //     $table->addColumn('actions', '&nbsp;');

        //     $table->editColumn('actions', function ($row) {
        //         $viewGate = 'balance_show';
        //         $editGate = 'balance_edit';
        //         $deleteGate = 'balance_delete';
        //         $crudRoutePart = 'balances';

        //         return view('partials.datatablesActions', compact(
        //         'viewGate',
        //         'editGate',
        //         'deleteGate',
        //         'crudRoutePart',
        //         'row'
        //     ));
        //     });

        //     $table->editColumn('id', function ($row) {
        //         return $row->id ? $row->id : '';
        //     });
        //     $table->editColumn('revenue', function ($row) {
        //         return $row->revenue ? $row->revenue : '';
        //     });
        //     $table->editColumn('payout', function ($row) {
        //         return $row->payout ? $row->payout : '';
        //     });
        //     $table->editColumn('profit', function ($row) {
        //         return $row->profit ? $row->profit : '';
        //     });
        //     $table->addColumn('payment_method_name', function ($row) {
        //         return $row->payment_method ? $row->payment_method->name : '';
        //     });

        //     $table->addColumn('payment_status_name', function ($row) {
        //         return $row->payment_status ? $row->payment_status->name : '';
        //     });

        //     $table->rawColumns(['actions', 'placeholder', 'payment_method', 'payment_status']);

        //     return $table->make(true);
        // }

        $accountingYears=Balance::groupBy('accounting_year')->pluck('accounting_year');

        return view('admin.balances.index',compact('accountingYears'));
    }

    public function getTabledata(Request $request)
    {

        $Year=$request->Year;
        $start=$request->start;
        $end=$request->end;

        $startMonth=date('F',strtotime($start));
        $startYear=date('Y',strtotime($start));
        $endMonth=date('F',strtotime($end));
        $endYear=date('Y',strtotime($end));

        $table='<thead>
        <tr>
          <th>Company Name</th>
          <th>January<br>'.$this->calculateNetworkMonthlyBalance("January",$Year).'</th>
          <th>February<br>'.$this->calculateNetworkMonthlyBalance("February",$Year).'</th>
          <th>March<br>'.$this->calculateNetworkMonthlyBalance("March",$Year).'</th>
          <th>April<br>'.$this->calculateNetworkMonthlyBalance("April",$Year).'</th>
          <th>May<br>'.$this->calculateNetworkMonthlyBalance("May",$Year).'</th>
          <th>June<br>'.$this->calculateNetworkMonthlyBalance("June",$Year).'</th>
          <th>July<br>'.$this->calculateNetworkMonthlyBalance("July",$Year).'</th>
          <th>August<br>'.$this->calculateNetworkMonthlyBalance("August",$Year).'</th>
          <th>September<br>'.$this->calculateNetworkMonthlyBalance("September",$Year).'</th>
          <th>October<br>'.$this->calculateNetworkMonthlyBalance("October",$Year).'</th>
          <th>November<br>'.$this->calculateNetworkMonthlyBalance("November",$Year).'</th>
          <th>December<br>'.$this->calculateNetworkMonthlyBalance("December",$Year).'</th>
          <th>Balance<br>'.$this->calculateNetworkYTDBalance($Year).'</th>
        </tr>
      </thead>';

      if($start && $end){

        $balances = Balance::where('accounting_year','>=',$startYear)->where('accounting_year','<=',$endYear)->groupBy('affiliate_id')->get();

        // $balances = Balance::where('accounting_year','>=',$startYear)->where('accounting_month','>=',$startMonth)->where('accounting_year','<=',$endYear)->where('accounting_month','<=',$endMonth)->groupBy('affiliate_id')->get();

      }else{
        $balances = Balance::groupBy('affiliate_id')->get();
      }
    

     foreach ($balances as $key => $balance) {
    
     $AffiliateID = null;
     $AffiliateID = $balance->affiliate_id;
     $Affiliate = $balance->affiliate;
                        
     // Calculate Monthly Start
     $monthArr = array(
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
    );
    
    $month = null;
    $monthColor = null;
    
    $monthVar = 0;

    foreach($monthArr as $k => $v)
						{
        list($status, $month[$monthVar]) = $this->grabMonthlyPayout($AffiliateID, $Year, $v);

        if($status == 'PAID')
        {
            $monthColor[$monthVar] = '#3cb371;font-weight: bold;';
        }
        if($status == 'PENDING')
        {
            $monthColor[$monthVar] = 'orange;font-weight: bold;';
        }
        if($status == 'ISSUE')
        {
            $monthColor[$monthVar] = 'red;font-weight: bold;';
        }

        if($status == '')
        {
            $monthColor[$monthVar] = 'black;font-weight: normal;';
        }

        if($month[$monthVar] == '' || $month[$monthVar] == '0')
        {
            $month[$monthVar] = '$0.00';
        }else{
            $month[$monthVar] = "$".round($month[$monthVar],2);
        }
        
        $monthVar++;
    }

      $table .= "<tr>";
      $table .= "
                <td>$Affiliate</td>
                  <td data-order='".$month[0]."'>
                      <font style='color:".$monthColor[0]."'>".$month[0]."</font>&nbsp;

                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[0]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[1]."'>
                      <font style='color:".$monthColor[1]."'>".$month[1]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[1]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[2]."'>
                      <font style='color:".$monthColor[2]."'>".$month[2]."</font>&nbsp; 
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[2]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[3]."'>
                      <font style='color:".$monthColor[3]."'>".$month[3]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[3]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[4]."'>
                      <font style='color:".$monthColor[4]."'>".$month[4]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[4]."');\"></i>
                      
                  </td>
                  
                  <td data-order='".$month[5]."'>
                      <font style='color:".$monthColor[5]."'>".$month[5]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[5]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[6]."'>
                      <font style='color:".$monthColor[6]."'>".$month[6]."</font>&nbsp;

                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[6]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[7]."'>
                      <font style='style='color:".$monthColor[7]."'>".$month[7]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[7]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[8]."'>
                      <font style='color:".$monthColor[8]."'>".$month[8]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[8]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[9]."'>
                      <font style='color:".$monthColor[9]."'>".$month[9]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[9]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[10]."'>
                      <font style='color:".$monthColor[10]."'>".$month[10]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[10]."');\"></i>
                  </td>
                  
                  <td data-order='".$month[11]."'>
                      <font style='color:".$monthColor[11]."'>".$month[11]."</font>&nbsp;
                      
                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$Year','".$monthArr[11]."');\"></i>
                  </td>
                  <td>".$this->calculateAffiliateYTDBalance($AffiliateID,$Year)."</td>";
        $table .= "</tr>";

    }

      echo $table;
    }

    public function getModeldata(Request $request)
    {
        $AffiliateID = $request->AffiliateID;
        $Year = $request->Year;
        $Month = $request->Month;

        $balance=Balance::where('affiliate_id',$AffiliateID)->first();

        $revenue=Balance::where('affiliate_id',$AffiliateID)->where('accounting_year',$Year)->where('accounting_month',$Month)->sum('revenue');
        $payout=Balance::where('affiliate_id',$AffiliateID)->where('accounting_year',$Year)->where('accounting_month',$Month)->sum('payout');
        $profit=Balance::where('affiliate_id',$AffiliateID)->where('accounting_year',$Year)->where('accounting_month',$Month)->sum('profit');

        $html= view('admin.balances.partials.balance-model', compact('AffiliateID','Year','Month','balance','revenue','payout','profit'))->render();

        echo $html;
        
    }

    public function SaveAccounting(Request $request)
    {
        
        $AffiliateID = $request->account;
        $Type = $request->type;
        $Amount = $request->amount;
        $Month = $request->month;
        $Year = $request->year;

        $checkBalance=Balance::where('accounting_year',$Year)->where('accounting_month',$Month)->where('affiliate_id',$AffiliateID)->first();

        if(!$checkBalance){

            $balance=Balance::where('affiliate_id',$AffiliateID)->first();

            $balanceInsert=new Balance;
            $balanceInsert->affiliate=$balance->affiliate;
            $balanceInsert->affiliate_id=$AffiliateID;
            $balanceInsert->accounting_year=$Year;
            $balanceInsert->accounting_month=$Month;
            $balanceInsert->save();
        }

        $updateBalance=Balance::where('accounting_year',$Year)->where('accounting_month',$Month)->where('affiliate_id',$AffiliateID)->first();

        if($Type == "Revenue"){
            $updateBalance->revenue=$Amount;
        }
        if($Type == "Payout"){
            $updateBalance->payout=$Amount;
        }
        if($Type == "Profit"){
            $updateBalance->profit=$Amount;
        }
        $updateBalance->save();
        

    }

    public function SavePaymentStatus(Request $request)
    {
        $Year = $request->year;
        $Month = $request->month;
        $AffiliateID = $request->account;
        $Status = $request->status;

        $balance=Balance::where('accounting_year',$Year)->where('accounting_month',$Month)->where('affiliate_id',$AffiliateID)->first();
        $balance->monthly_status=$Status;
        $balance->save();

    }

    public function SavePaymentInfo(Request $request)
    {
        $AffID = $request->AffID;
        $ACHName = $request->ACHName;
        $ACHAccount = $request->ACHAccount;
        $ACHRouting = $request->ACHRouting;
        $WireName = $request->WireName;
        $WireAccount = $request->WireAccount;
        $WireRouting = $request->WireRouting;
        $WireSWIFT = $request->WireSWIFT;
        $Paypal = $request->Paypal;
        $PaymentType = $request->PaymentType;

        $balance=Balance::where('affiliate_id',$AffID)->first();
        $balance->ach_name=$ACHName;
        $balance->ach_account=$ACHAccount;
        $balance->ach_routing=$ACHRouting;
        $balance->wire_name=$WireName;
        $balance->wire_account=$WireAccount;
        $balance->wire_routing=$WireRouting;
        $balance->wire_swift=$WireSWIFT;
        $balance->paypal=$Paypal;
        $balance->payment_type=$PaymentType;
        $balance->save();
    }

    public function SaveNotes(Request $request)
    {
        $Note = $request->notes;
        $AccountID = $request->AccountID;
        $Note = addslashes($Note);

        $balance=Balance::where('affiliate_id',$AccountID)->first();
        $balance->publisher_notes=$Note;
        $balance->save();
    }

    public function grabMonthlyPayout($AffiliateID, $Year, $Month)
    {
        $balance=Balance::select(\DB::raw('SUM(payout) AS payout'),'monthly_status AS status')->where('accounting_year',$Year)->where('accounting_month',$Month)->where('affiliate_id',$AffiliateID)->first();        
        return array($balance->status, $balance->payout);
    }

    public function calculateNetworkMonthlyBalance($Month, $Year)
    {
        $payout=Balance::where('accounting_year',$Year)->where('accounting_month',$Month)->sum('payout');
        $Balance = "$".number_format($payout);
        return $Balance;
    }

    public function calculateNetworkYTDBalance($Year)
    {
        $payout=Balance::where('accounting_year',$Year)->whereNull('monthly_status')->sum('payout');
        $Balance = "$".number_format($payout);
        return $Balance;
    }

    public function calculateAffiliateYTDBalance($AffiliateID, $Year)
    {
        $payout=Balance::where('affiliate_id',$AffiliateID)->where('accounting_year',$Year)->whereNull('monthly_status')->sum('payout');
        $Balance = "$".number_format($payout);
        return $Balance;
    }

    public function create()
    {
        abort_if(Gate::denies('balance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.balances.create', compact('payment_methods', 'payment_statuses'));
    }

    public function store(StoreBalanceRequest $request)
    {
        $balance = Balance::create($request->all());

        return redirect()->route('admin.balances.index');
    }

    public function edit(Balance $balance)
    {
        abort_if(Gate::denies('balance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $balance->load('payment_method', 'payment_status');

        return view('admin.balances.edit', compact('payment_methods', 'payment_statuses', 'balance'));
    }

    public function update(UpdateBalanceRequest $request, Balance $balance)
    {
        $balance->update($request->all());

        return redirect()->route('admin.balances.index');
    }

    public function show(Balance $balance)
    {
        abort_if(Gate::denies('balance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->load('payment_method', 'payment_status');

        return view('admin.balances.show', compact('balance'));
    }

    public function destroy(Balance $balance)
    {
        abort_if(Gate::denies('balance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->delete();

        return back();
    }

    public function massDestroy(MassDestroyBalanceRequest $request)
    {
        Balance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function sendInvoiceMail(Request $request)
    {
        $account=Affiliate::with(["Accounts" => function($q){
            $q->where('AccountType', 1);
        }])->where('id', $request->aid)->first();

        $input = [
            'message' => $request->invoiceData,
            'subject' => 'Invoice for your account from Netiquette Ads',
        ];

        $send=\Mail::to($account->Accounts->EmailAddress)->send(new SendInvoiceMail($input));
    }
    
}
