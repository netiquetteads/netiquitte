<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'balances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_name_id',
        'revenue',
        'payout',
        'profit',
        'payment_status_id',
        'payment_method_id',
        'publisher_notes',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function company_name()
    {
        return $this->belongsTo(Account::class, 'company_name_id');
    }

    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}