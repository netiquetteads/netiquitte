<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAffiliateRequest;
use App\Http\Requests\StoreAffiliateRequest;
use App\Http\Requests\UpdateAffiliateRequest;
use App\Models\AccountStatus;
use App\Models\Affiliate;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AffiliateController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $status = '')
    {
        abort_if(Gate::denies('affiliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            if ($status) {
                $query = Affiliate::with(['team'])->select(sprintf('%s.*', (new Affiliate())->table))->where('account_status', $status);
            } else {
                $query = Affiliate::with(['team'])->select(sprintf('%s.*', (new Affiliate())->table));
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'affiliate_show';
                $editGate = 'affiliate_edit';
                $deleteGate = 'affiliate_delete';
                $crudRoutePart = 'affiliates';

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
            // $table->addColumn('account_status_name', function ($row) {
            //     return $row->account_status ? $row->account_status : '';
            // });

            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('everflow_account', function ($row) {
                return $row->everflow_account ? $row->everflow_account : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled '.($row->published ? 'checked' : null).'>';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'published']);

            return $table->make(true);
        }

        return view('admin.affiliates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('affiliate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_statuses = AccountStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.affiliates.create', compact('account_statuses'));
    }

    public function store(StoreAffiliateRequest $request)
    {
        $affiliate = Affiliate::create($request->all());

        if ($request->input('logo', false)) {
            $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('featured_image', false)) {
            $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $affiliate->id]);
        }

        return redirect()->route('admin.affiliates.index');
    }

    public function edit(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_statuses = AccountStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $affiliate->load('team');

        return view('admin.affiliates.edit', compact('account_statuses', 'affiliate'));
    }

    public function update(UpdateAffiliateRequest $request, Affiliate $affiliate)
    {
        $affiliate->update($request->all());

        if ($request->input('logo', false)) {
            if (! $affiliate->logo || $request->input('logo') !== $affiliate->logo->file_name) {
                if ($affiliate->logo) {
                    $affiliate->logo->delete();
                }
                $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($affiliate->logo) {
            $affiliate->logo->delete();
        }

        if ($request->input('featured_image', false)) {
            if (! $affiliate->featured_image || $request->input('featured_image') !== $affiliate->featured_image->file_name) {
                if ($affiliate->featured_image) {
                    $affiliate->featured_image->delete();
                }
                $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($affiliate->featured_image) {
            $affiliate->featured_image->delete();
        }

        return redirect()->route('admin.affiliates.index');
    }

    public function show(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate->load('team');

        return view('admin.affiliates.show', compact('affiliate'));
    }

    public function destroy(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffiliateRequest $request)
    {
        Affiliate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('affiliate_create') && Gate::denies('affiliate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Affiliate();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
