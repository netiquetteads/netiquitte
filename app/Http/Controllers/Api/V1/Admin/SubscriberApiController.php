<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Http\Resources\Admin\SubscriberResource;
use App\Models\Subscriber;
use App\Models\Unsubscriber;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubscriberApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('subscriber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriberResource(Subscriber::all());
    }

    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = Subscriber::create($request->all());

        return (new SubscriberResource($subscriber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Subscriber $subscriber)
    {
        //abort_if(Gate::denies('subscriber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriberResource($subscriber);
    }

    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->all());

        return (new SubscriberResource($subscriber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Subscriber $subscriber)
    {
        //abort_if(Gate::denies('subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function GetUnsubscribes()
    {
        $apiKey = env('SENDGRID_API_KEY');

        $sg = new \SendGrid($apiKey);
        try {
            $response = $sg->client->suppression()->unsubscribes()->get();
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";

            $results = json_decode($response->body());

            foreach ($results as $key => $result) {
                $unsubscriber = Unsubscriber::where('email', $result->email)->first();
                if (empty($unsubscriber)) {
                    Unsubscriber::create(['email'=>$result->email]);
                }
            }

            echo 'done';
        } catch (Exception $ex) {
            echo 'Caught exception: '.$ex->getMessage();
        }
    }
}
