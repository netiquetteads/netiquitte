<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unsubscriber;
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
            $query = Unsubscriber::get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'unsubscriber_show';
                $editGate = 'unsubscriber_edit';
                $deleteGate = 'unsubscriber_delete';
                $crudRoutePart = 'unsubscribers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ?? '';
            });

            $table->rawColumns(['email', 'placeholder', 'actions']);

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
        return view('admin.unsubscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unsubscriber = Unsubscriber::create($request->all());

        $apiKey = env('SENDGRID_API_KEY');

        $sg = new \SendGrid($apiKey);
        $request_body = json_decode('{
            "recipient_emails": [
                "'.$unsubscriber->email.'"
            ]
        }');

        try {
            $response = $sg->client->asm()->suppressions()->global()->post($request_body);
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $ex) {
            echo 'Caught exception: '.$ex->getMessage();
        }

        return redirect()->route('admin.unsubscribers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unsubscriber $unsubscriber)
    {
        return view('admin.unsubscribers.show', compact('unsubscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unsubscriber $unsubscriber, Request $request)
    {
        return view('admin.unsubscribers.edit', compact('unsubscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unsubscriber $unsubscriber)
    {
        $unsubscriber->update($request->all());

        return redirect()->route('admin.unsubscribers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unsubscriber $unsubscriber)
    {
        $apiKey = env('SENDGRID_API_KEY');
        $sg = new \SendGrid($apiKey);
        $email = $unsubscriber->email;

        try {
            $response = $sg->client->asm()->suppressions()->global()->_($email)->delete();
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $ex) {
            echo 'Caught exception: '.$ex->getMessage();
        }

        $unsubscriber->delete();

        return back();
    }
}
