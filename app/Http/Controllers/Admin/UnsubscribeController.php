<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UnsubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Account::where('SubscribedStatus', 'Unsubscribed')->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            //$table->addColumn('actions', '&nbsp;');

            // $table->editColumn('actions', function ($row) {
            //     $viewGate = 'subscriber_show';
            //     $editGate = 'subscriber_edit';
            //     $deleteGate = 'subscriber_delete';
            //     $crudRoutePart = 'subscribers';

            //     return view('partials.datatablesActions', compact(
            //     'viewGate',
            //     'editGate',
            //     'deleteGate',
            //     'crudRoutePart',
            //     'row'
            // ));
            // });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->EmailAddress ? $row->EmailAddress : '';
            });

            $table->rawColumns(['email', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.unsubscribers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
