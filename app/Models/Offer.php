<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SOURCE_SELECT = [
        '1' => 'Everflow',
    ];

    public const OFFER_STATUS_SELECT = [
        '1' => 'Active',
    ];

    public $table = 'offers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'preview_url',
        'source',
        'payout',
        'revenue',
        'offer_status',
        'margin',
        'affiliate_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
