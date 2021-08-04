<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailHistory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'mail_histories';

    protected $dates = [
        'time_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'posted_campaign_id',
        'time_sent',
        'emails_sent',
        'list',
        'opens',
        'unopened',
        'email_template',
        'campaign',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function posted_campaign()
    {
        return $this->belongsTo(Template::class, 'posted_campaign_id');
    }

    public function getTimeSentAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeSentAttribute($value)
    {
        $this->attributes['time_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
