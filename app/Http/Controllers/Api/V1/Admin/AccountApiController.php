<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\Admin\AccountResource;
use App\Models\Account;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource(Account::with(['team'])->get());
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());

        if ($request->input('featured_image', false)) {
            $account->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource($account->load(['team']));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());

        if ($request->input('featured_image', false)) {
            if (!$account->featured_image || $request->input('featured_image') !== $account->featured_image->file_name) {
                if ($account->featured_image) {
                    $account->featured_image->delete();
                }
                $account->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($account->featured_image) {
            $account->featured_image->delete();
        }

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
