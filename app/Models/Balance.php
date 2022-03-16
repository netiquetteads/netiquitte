<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'balances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'affiliate',
        'affiliate_id',
        'accounting_year',
        'accounting_month',
        'accounting_date',
        'monthly_status',
        'ach_name',
        'ach_account',
        'ach_routing',
        'wire_name',
        'wire_account',
        'wire_routing',
        'wire_swift',
        'paypal',
        'wire_name',
        'revenue',
        'payout',
        'profit',
        'publisher_notes',
        'payment_method_id',
        'payment_status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
