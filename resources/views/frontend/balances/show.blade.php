@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.balance.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.balances.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $balance->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.revenue') }}
                                    </th>
                                    <td>
                                        {{ $balance->revenue }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.payout') }}
                                    </th>
                                    <td>
                                        {{ $balance->payout }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.profit') }}
                                    </th>
                                    <td>
                                        {{ $balance->profit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.publisher_notes') }}
                                    </th>
                                    <td>
                                        {{ $balance->publisher_notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $balance->payment_method->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.balance.fields.payment_status') }}
                                    </th>
                                    <td>
                                        {{ $balance->payment_status->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.balances.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection