<?php

namespace App\Observers;

use App\Models\Campaign;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CampaignActionObserver
{
    public function created(Campaign $model)
    {
        $data = ['action' => 'created', 'model_name' => 'Campaign'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
