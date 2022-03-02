<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBalanceRequest;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Mail\SendInvoiceMail;
use App\Models\Affiliate;
use App\Models\Balance;
use App\Models\PaymentMailLogs;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodType;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

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

        $accountingYears = Balance::groupBy('accounting_year')->pluck('accounting_year');

        return view('admin.balances.index', compact('accountingYears'));
    }

    public function getTabledata(Request $request)
    {
        // $Year=$request->Year;
        $startDate = $request->start;
        $endDate = $request->end;

        $start = strtotime($request->start);
        $end = strtotime($request->end);

        $table = '<thead>
        <tr>
        <th>Company Name</th>';

        while ($start < $end) {
            $table .= '<th>'.date('M Y', $start).'</th>';

            $start = strtotime('+1 month', $start);
        }

        $table .= '<th>Total</th>
          </tr>
      </thead>';

        if ($startDate && $endDate) {
            $balances = Balance::where('accounting_year', '>=', date('Y', strtotime($startDate)))->where('accounting_year', '<=', date('Y', strtotime($endDate)))->groupBy('affiliate_id')->get();
        } else {
            $balances = Balance::groupBy('affiliate_id')->where('accounting_year', date('Y', $startDate))->get();
        }

        $grandTotal = 0;
        $grandMonthlyTotal = [];

        foreach ($balances as $key => $balance) {
            $AffiliateID = null;
            $AffiliateID = $balance->affiliate_id;
            $Affiliate = $balance->affiliate;

            $payout = null;
            $monthColor = null;

            $totalPayout = 0;

            $start = $request->start;
            $end = $request->end;

            $start = strtotime($start);
            $end = strtotime($end);

            $table .= '<tr>';
            $table .= "
                <td data-order='".$Affiliate."'>$Affiliate</td>";

            while ($start < $end) {
                $cYear = date('Y', $start);
                $cMonth = date('F', $start);

                [$status, $payout] = $this->grabMonthlyPayout($AffiliateID, $cYear, $cMonth);

                if ($payout == '' || $payout == '0') {
                    $payout = '$0.00';
                    $tpay = 0.00;
                } else {
                    $tpay = round($payout, 2);
                    $payout = '$'.round($payout, 2);
                }

                if ($status == 'UNPAID') {
                    $monthColor = 'black;font-weight: bold;';
                    $bgColor = '#EC7063;';
                }
                if ($status == 'PENDING' || $status == '') {
                    $monthColor = 'black;font-weight: bold;';
                    $bgColor = '#FCE7D2;';
                }

                // if($status == '')
                // {
                //     $monthColor = 'black;font-weight: bold;';
                //     $bgColor = '#FCE7D2;';
                // }

                if ($status == 'PAID') {
                    $monthColor = 'black;font-weight: bold;';
                    $bgColor = '#ADF5B0;';
                } else {
                    $totalPayout = $totalPayout + $tpay;

                    if (@$grandMonthlyTotal[$cYear.$cMonth]) {
                        $grandMonthlyTotal[$cYear.$cMonth] = $tpay + $grandMonthlyTotal[$cYear.$cMonth];
                    } else {
                        $grandMonthlyTotal[$cYear.$cMonth] = $tpay;
                    }
                }

                $table .= "<td data-order='".$payout."' style='background: ".$bgColor."'>
                      <font style='color:".$monthColor."'>".$payout."</font>&nbsp;

                      <i style='float:right' class=\"fa fa-edit\" aria-hidden=\"true\" onclick=\"OpenModal('$AffiliateID','$cYear','".$cMonth."');\"></i>
                  </td>";

                $start = strtotime('+1 month', $start);
            }

            $grandTotal = $grandTotal + $totalPayout;

            $table .= "<td id='totalAmount".$AffiliateID."' data-order='$".$totalPayout."'>$".$totalPayout.'</td>';
            $table .= '</tr>';
        }

        // dump($grandMonthlyTotal);
        $table .= '<tr><th>Total</th>';
        foreach ($grandMonthlyTotal as $key => $value) {
            $table .= '<th>$'.$value.'</th>';
        }
        $table .= '<th>$'.$grandTotal.'</th></tr>';

        echo $table;
    }

    public function getModeldata(Request $request)
    {
        $AffiliateID = $request->AffiliateID;
        $Year = $request->Year;
        $Month = $request->Month;
        $total = $request->total;

        $paymentMethod = PaymentMethod::where('affiliate_id', $AffiliateID)->first();

        $paymentMethodTypes = PaymentMethodType::get();

        $affiliate = Affiliate::where('id', $AffiliateID)->first();

        $paymentMailLogs = PaymentMailLogs::where('affiliate_id', $AffiliateID)->orderBy('id', 'DESC')->get();

        $balance = Balance::where('affiliate_id', $AffiliateID)->where('accounting_year', $Year)->where('accounting_month', $Month)->first();

        $revenue = Balance::where('affiliate_id', $AffiliateID)->where('accounting_year', $Year)->where('accounting_month', $Month)->sum('revenue');
        $payout = Balance::where('affiliate_id', $AffiliateID)->where('accounting_year', $Year)->where('accounting_month', $Month)->sum('payout');
        $profit = Balance::where('affiliate_id', $AffiliateID)->where('accounting_year', $Year)->where('accounting_month', $Month)->sum('profit');

        $html = view('admin.balances.partials.balance-model', compact('AffiliateID', 'Year', 'Month', 'balance', 'revenue', 'payout', 'profit', 'total', 'paymentMethod', 'affiliate', 'paymentMailLogs', 'paymentMethodTypes'))->render();

        echo $html;
    }

    public function SaveAccounting(Request $request)
    {
        $AffiliateID = $request->account;
        $Type = $request->type;
        $Amount = $request->amount;
        $Month = $request->month;
        $Year = $request->year;

        $checkBalance = Balance::where('accounting_year', $Year)->where('accounting_month', $Month)->where('affiliate_id', $AffiliateID)->first();

        if (! $checkBalance) {
            $balance = Balance::where('affiliate_id', $AffiliateID)->first();

            $balanceInsert = new Balance;
            $balanceInsert->affiliate = $balance->affiliate;
            $balanceInsert->affiliate_id = $AffiliateID;
            $balanceInsert->accounting_year = $Year;
            $balanceInsert->accounting_month = $Month;
            $balanceInsert->save();
        }

        $updateBalance = Balance::where('accounting_year', $Year)->where('accounting_month', $Month)->where('affiliate_id', $AffiliateID)->first();

        if ($Type == 'Revenue') {
            $updateBalance->revenue = $Amount;
        }
        if ($Type == 'Payout') {
            $updateBalance->payout = $Amount;
        }
        if ($Type == 'Profit') {
            $updateBalance->profit = $Amount;
        }
        $updateBalance->save();
    }

    public function SavePaymentStatus(Request $request)
    {
        $Year = $request->year;
        $Month = $request->month;
        $AffiliateID = $request->account;
        $Status = $request->status;

        $balance = Balance::where('accounting_year', $Year)->where('accounting_month', $Month)->where('affiliate_id', $AffiliateID)->first();
        $balance->monthly_status = $Status;
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

        $balance = Balance::where('affiliate_id', $AffID)->first();
        $balance->ach_name = $ACHName;
        $balance->ach_account = $ACHAccount;
        $balance->ach_routing = $ACHRouting;
        $balance->wire_name = $WireName;
        $balance->wire_account = $WireAccount;
        $balance->wire_routing = $WireRouting;
        $balance->wire_swift = $WireSWIFT;
        $balance->paypal = $Paypal;
        $balance->payment_type = $PaymentType;
        $balance->save();
    }

    public function SaveNotes(Request $request)
    {
        $Note = $request->notes;
        $AccountID = $request->AccountID;
        $Note = addslashes($Note);

        $balance = Balance::where('affiliate_id', $AccountID)->first();
        $balance->publisher_notes = $Note;
        $balance->save();
    }

    public function grabMonthlyPayout($AffiliateID, $Year, $Month)
    {
        $balance = Balance::select(\DB::raw('SUM(payout) AS payout'), 'monthly_status AS status')->where('accounting_year', $Year)->where('accounting_month', $Month)->where('affiliate_id', $AffiliateID)->first();

        return [$balance->status, $balance->payout];
    }

    public function calculateNetworkMonthlyBalance($Month, $Year)
    {
        $payout = Balance::where('accounting_year', $Year)->where('accounting_month', $Month)->sum('payout');
        $Balance = '$'.number_format($payout);

        return $Balance;
    }

    public function calculateNetworkYTDBalance($Year)
    {
        $payout = Balance::where('accounting_year', $Year)->whereNull('monthly_status')->sum('payout');
        $Balance = '$'.number_format($payout);

        return $Balance;
    }

    public function calculateAffiliateYTDBalance($AffiliateID, $Year)
    {
        $payout = Balance::where('affiliate_id', $AffiliateID)->where('accounting_year', $Year)->whereNull('monthly_status')->sum('payout');
        $Balance = '$'.number_format($payout);

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
        $account = Affiliate::with(['Accounts' => function ($q) {
            $q->where('AccountType', 1);
        }])->where('id', $request->aid)->first();

        $content = str_replace('{FirstName}', $account->Accounts->FirstName, $request->invoiceData);

        $input = [
            'email_subject' => $account->Accounts->FirstName.', You have Been Paid',
            'email_body' => $content,
            'from_name' => $account->Accounts->FirstName,
            'email' => $account->Accounts->EmailAddress,
            'email_opened' => 0,
            'email_open_date' => '',
            'email_open_time' => '',
            'affiliate_id' => $request->aid,
        ];

        $PaymentMailLogs = PaymentMailLogs::create($input);

        $url = url('').'/paymentOpenEmail?id='.$PaymentMailLogs->id.'&aid='.$input['affiliate_id'];
        $input['email_body'] = $input['email_body']."<img src='".$url."' width='1' height='1' />";

        $send = \Mail::to($account->Accounts->EmailAddress)->send(new SendInvoiceMail($input));
    }
}
