<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class UnsubscribeController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->id;
        $type=$request->type;

        Account::where('PlatformUserID',$id)->where('AccountType',$type)->update([
            'SubscribedStatus' => 'Unsubscribed',
        ]);

        return redirect('success');
    }

    public function success()
    {
        return view('unsubscribed');
    }
}
