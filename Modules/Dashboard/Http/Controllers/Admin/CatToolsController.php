<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Entities;
use Modules\Dashboard\Requests;
use Yajra\DataTables\Facades\DataTables;

class CatToolsController extends Controller
{

    public function index()
    {
        return view('dashboard::admin.cat-tools.index',compact(['items']));
    }

    public function show(){

    }

    public function create(){
        return view('dashboard::admin.cat-tools.create');
    }

    public function store(Requests\CreateCatToolRequest $request)
    {

        $entity = new Entities\CatTool($request->all());
        $entity->save();

        return redirect()->route('admin.cat-tools.index')
            ->with('success',trans('dashboard::messages.create.success',['entity' => $request->name]));
    }

    public function edit(Entities\CatTool $cat_tool){

        $entity = $cat_tool;

        return view('dashboard::admin.cat-tools.edit',compact('entity'));
    }

    public function update(Entities\CatTool $cat_tool, Requests\UpdateCatToolRequest $request){

        $cat_tool->update($request->all());

        return redirect()->route('admin.cat-tools.index')
            ->with('success',trans('dashboard::messages.update.success',['entity' => $cat_tool->name]));
    }

    public function destroy(Entities\CatTool $cat_tool){

        $entityLabel = $cat_tool->name;
        $cat_tool->delete();

        return redirect()->route('admin.cat-tools.index')
            ->with('success',trans('dashboard::messages.delete.success',['entity' => $entityLabel]));
    }

    public function datatable(Request $request)
    {

        $items = Entities\CatTool::query();

        return DataTables::eloquent($items)
            ->editColumn('name',function($record){
                return ($record->name)? $record->name: '---';
            })
            ->addColumn(
                'actions',
                '<div class="btn-group pull-right">
                    <a href="{{ route(\'admin.cat-tools.edit\', [$id]) }}" 
                    class="btn btn-success btn-xs legitRipple"><i class="icon-pencil6 position-left"></i> {{ trans(\'dashboard::buttons.edit\') }}</a>
                    <button type="button" 
                    class="btn btn-danger btn-xs legitRipple" 
                    data-toggle="modal" 
                    data-target="#modal_theme_danger"
                    data-action-target="{{ route(\'admin.cat-tools.destroy\', [$id]) }}"><i class="icon-bin position-left"></i>{{ trans(\'dashboard::buttons.delete\') }}</button>
                </div>'
            )
            ->rawColumns(['actions'])
            ->make(true);

    }
}
