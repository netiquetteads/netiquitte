<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempEmail extends Model
{
    use HasFactory;

    public $table = 'temp_emails';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'from_name',
        'email',
        'email_subject',
        'email_name',
        'email_from',
        'email_body',
        'sent_to',
        'email_status',
        'email_opened',
        'email_open_date',
        'email_open_time',
        'campaign_id',
        'created_at',
        'updated_at',
    ];
}
