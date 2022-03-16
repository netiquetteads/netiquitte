<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Campaign',
            'date_field' => 'created_at',
            'field'      => 'name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.campaigns.edit',
        ],
    ];

    public $sources2 = [
        [
            'model'      => '\App\Models\Task',
            'date_field' => 'created_at',
            'field'      => 'name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.campaigns.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'].' '.$model->{$source['field']}.' '.$source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }

    public function calendar()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'].' '.$model->{$source['field']}.' '.$source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        foreach ($this->sources2 as $sources2) {
            foreach ($sources2['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$sources2['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($sources2['prefix'].' '.$model->{$sources2['field']}.' '.$sources2['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($sources2['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
