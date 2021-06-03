<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const ACCOUNT_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    public $table = 'accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'company',
        'account_status',
        'created_at',
        'everflow_account',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
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
