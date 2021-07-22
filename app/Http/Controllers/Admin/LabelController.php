<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLabelRequest;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LabelController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('label_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Label::query()->select(sprintf('%s.*', (new Label())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'label_show';
                $editGate = 'label_edit';
                $deleteGate = 'label_delete';
                $crudRoutePart = 'labels';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.labels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('label_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.labels.create');
    }

    public function store(StoreLabelRequest $request)
    {
        $label = Label::create($request->all());

        return redirect()->route('admin.labels.index');
    }

    public function edit(Label $label)
    {
        abort_if(Gate::denies('label_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.labels.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {
        $label->update($request->all());

        return redirect()->route('admin.labels.index');
    }

    public function show(Label $label)
    {
        abort_if(Gate::denies('label_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.labels.show', compact('label'));
    }

    public function destroy(Label $label)
    {
        abort_if(Gate::denies('label_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $label->delete();

        return back();
    }

    public function massDestroy(MassDestroyLabelRequest $request)
    {
        Label::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
