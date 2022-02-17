<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const NAME_SELECT = [
        '1' => 'ACH',
        '2' => 'Paypal',
        '3' => 'Wire Transfer',
    ];

    public $table = 'payment_methods';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_name',
        'account_number',
        'routing_number',
        'swift',
        'paypal_email',
        'explanation',
        'company_select',
        'account_num_select',
        'routing_select',
        'explanation_select',
        'custom_email',
        'custom_email_select',
        'swift_select',
        'paypal_email_select',
        'account_name_select',
        'payment_method_type_id',
        'affiliate_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function payment_method_type()
    {
        return $this->belongsTo(PaymentMethodType::class, 'payment_method_type_id');
    }

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }
}
