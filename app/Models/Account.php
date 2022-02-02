<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName',
        'LastName',
        'EmailAddress',
        'Company',
        'PlatformUserID',
        'UserPassword',
        'AccountStatus',
        'Hash',
        'LastAccessDate',
        'LastAccessIP',
        'IPAddress',
        'AccountType',
        'BillingFrequency',
        'SubscribedStatus',
        'UnsubscribeDate',
        'UnsubscribeTime',
        'created_at',
        'updated_at',
    ];

    // public function Affiliates()
    // {
    //     return $this->belongsToMany(Affiliate::class,'PlatformUserID');
    // }
}
