<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Flasher\SweetAlert\Prime\SweetAlertFactory;
use Flasher\Notyf\Prime\NotyfFactory;
use Flasher\Prime\FlasherInterface;
use Flasher\Toastr\Prime\ToastrFactory;

class HomeController extends Controller
{
    public function index(SweetAlertFactory $sweetFlasher, NotyfFactory $notyFlasher, FlasherInterface $flasher,ToastrFactory $toastrFlasher)
    {
        $settings1 = [
            'chart_title'           => 'Emails Sent',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Campaign',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'subs',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'm/d/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'campaign',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m').'-01'; break;
                case 'year': $start = date('Y').'-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $sweetFlasher->addSuccess('Data has been saved successfully!');
        $notyFlasher->addSuccess('Data has been saved successfully!');
        $flasher->addSuccess('Data has been saved successfully!');
        $toastrFlasher->addSuccess('Data has been saved successfully!');

        return view('home', compact('settings1'));
    }
}
