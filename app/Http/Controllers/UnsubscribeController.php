<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\TempEmail;
use Illuminate\Http\Request;

class UnsubscribeController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        Account::where('PlatformUserID', $id)->where('AccountType', $type)->update([
            'SubscribedStatus' => 'Unsubscribed',
        ]);

        return redirect('success');
    }

    public function success()
    {
        return view('unsubscribed');
    }

    public function openEmail(Request $request)
    {
        if ($request->eid) {
            $tempEmail = TempEmail::where('email', $request->eid)->where('campaign_id', $request->cid)->where('email_opened', '')->first();
            if ($tempEmail) {
                $tempEmail->email_opened = 'opened';
                $tempEmail->email_open_date = date('Y-m-d');
                $tempEmail->email_open_time = date('h:i:s');
                $tempEmail->save();
            }
        }
    }
}
