<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'subscriptions';

    protected $dates = [
        'subscribed_date',
        'unsubscribed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subscriber_id',
        'offer_subscription_id',
        'subscribed_date',
        'subscribed_time',
        'unsubscribed_date',
        'unsubscribed_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }

    public function offer_subscription()
    {
        return $this->belongsTo(Offer::class, 'offer_subscription_id');
    }

    public function getSubscribedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSubscribedDateAttribute($value)
    {
        $this->attributes['subscribed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUnsubscribedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUnsubscribedDateAttribute($value)
    {
        $this->attributes['unsubscribed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
