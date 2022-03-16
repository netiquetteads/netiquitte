<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdvertiserRequest;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Http\Requests\UpdateAdvertiserRequest;
use App\Models\Advertiser;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdvertiserController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $status = '')
    {
        abort_if(Gate::denies('advertiser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            if ($status) {
                $query = Advertiser::query()->select(sprintf('%s.*', (new Advertiser())->table))->where('account_status', $status);
            } else {
                $query = Advertiser::query()->select(sprintf('%s.*', (new Advertiser())->table));
            }
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'advertiser_show';
                $editGate = 'advertiser_edit';
                $deleteGate = 'advertiser_delete';
                $crudRoutePart = 'advertisers';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('account_status', function ($row) {
                return $row->account_status ? $row->account_status : '';
            });
            $table->editColumn('everflow_account', function ($row) {
                return $row->everflow_account ? $row->everflow_account : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled '.($row->published ? 'checked' : null).'>';
            });
            $table->editColumn('platform_url', function ($row) {
                return $row->platform_url ? $row->platform_url : '';
            });
            $table->editColumn('platform_username', function ($row) {
                return $row->platform_username ? $row->platform_username : '';
            });
            $table->editColumn('affiliate_id_macro', function ($row) {
                return $row->affiliate_id_macro ? $row->affiliate_id_macro : '';
            });
            $table->editColumn('attribution_method', function ($row) {
                return $row->attribution_method ? $row->attribution_method : '';
            });
            $table->editColumn('email_attribution_method', function ($row) {
                return $row->email_attribution_method ? $row->email_attribution_method : '';
            });
            $table->editColumn('network_advertiserid', function ($row) {
                return $row->network_advertiserid ? $row->network_advertiserid : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.advertisers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('advertiser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisers.create');
    }

    public function store(StoreAdvertiserRequest $request)
    {
        $advertiser = Advertiser::create($request->all());

        if ($request->input('featured_image', false)) {
            $advertiser->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $advertiser->id]);
        }

        return redirect()->route('admin.advertisers.index');
    }

    public function edit(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisers.edit', compact('advertiser'));
    }

    public function update(UpdateAdvertiserRequest $request, Advertiser $advertiser)
    {
        $advertiser->update($request->all());

        if ($request->input('featured_image', false)) {
            if (! $advertiser->featured_image || $request->input('featured_image') !== $advertiser->featured_image->file_name) {
                if ($advertiser->featured_image) {
                    $advertiser->featured_image->delete();
                }
                $advertiser->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($advertiser->featured_image) {
            $advertiser->featured_image->delete();
        }

        return redirect()->route('admin.advertisers.index');
    }

    public function show(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisers.show', compact('advertiser'));
    }

    public function destroy(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiser->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertiserRequest $request)
    {
        Advertiser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('advertiser_create') && Gate::denies('advertiser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Advertiser();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
