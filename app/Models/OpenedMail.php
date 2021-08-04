<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpenedMail extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'opened_mails';

    protected $dates = [
        'open_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email',
        'open_time',
        'open_date',
        'campaige_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getOpenDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOpenDateAttribute($value)
    {
        $this->attributes['open_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function campaige()
    {
        return $this->belongsTo(MailHistory::class, 'campaige_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
