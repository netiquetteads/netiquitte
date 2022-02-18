<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMailLogs extends Model
{
    use HasFactory;

    public $table = 'payment_mail_logs';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'from_name',
        'email',
        'email_subject',
        'email_body',
        'email_opened',
        'email_open_date',
        'email_open_time',
        'affiliate_id',
        'created_at',
        'updated_at',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }
}
