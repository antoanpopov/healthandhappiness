<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Entities;
use Modules\Dashboard\Requests;
use Yajra\DataTables\Facades\DataTables;

class ExpertiseController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return view('dashboard::admin.expertise.index',compact(['items']));
    }

    public function show(){

    }

    public function create(){
        return view('dashboard::admin.expertise.create');
    }

    public function store(Requests\CreateExpertiseRequest $request)
    {

        $entity = new Entities\Expertise($request->all());
        $entity->save();

        return redirect()->route('admin.expertise.index')
            ->with('success',trans('dashboard::messages.create.success',['entity' => $request->name]));
    }

    public function edit(Entities\Expertise $cat_tool){

        $entity = $cat_tool;

        return view('dashboard::admin.expertise.edit',compact('entity'));
    }

    public function update(Entities\Expertise $cat_tool, Requests\UpdateExpertiseRequest $request){

        $cat_tool->update($request->all());

        return redirect()->route('admin.expertise.index')
            ->with('success',trans('dashboard::messages.update.success',['entity' => $cat_tool->name]));
    }

    public function destroy(Entities\Expertise $expertise){

        $entityLabel = $expertise->name;
        $expertise->delete();

        return redirect()->route('admin.expertise.index')
            ->with('success',trans('dashboard::messages.delete.success',['entity' => $entityLabel]));
    }

    public function datatable(Request $request)
    {

        $items = Entities\Expertise::query();

        return DataTables::eloquent($items)
            ->editColumn('name',function($record){
                return ($record->name)? $record->name: '---';
            })
            ->addColumn(
                'actions',
                '<div class="btn-group pull-right">
                    <a href="{{ route(\'admin.expertise.edit\', [$id]) }}" 
                    class="btn btn-success btn-xs legitRipple"><i class="icon-pencil6 position-left"></i> {{ trans(\'dashboard::buttons.edit\') }}</a>
                    <button type="button" 
                    class="btn btn-danger btn-xs legitRipple" 
                    data-toggle="modal" 
                    data-target="#modal_theme_danger"
                    data-action-target="{{ route(\'admin.expertise.destroy\', [$id]) }}"><i class="icon-bin position-left"></i>{{ trans(\'dashboard::buttons.delete\') }}</button>
                </div>'
            )
            ->rawColumns(['actions'])
            ->make(true);

    }
}
