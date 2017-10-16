<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Entities;
use Modules\Dashboard\Requests;
use Yajra\DataTables\Facades\DataTables;

class LanguagesController extends Controller
{

    public function index()
    {
        return view('dashboard::admin.languages.index',compact(['items']));
    }

    public function show(){

    }

    public function create(){
        return view('dashboard::admin.languages.create');
    }

    public function store(Requests\CreateLanguageRequest $request)
    {

        $entity = new Entities\Language($request->all());
        $entity->save();

        return redirect()->route('admin.languages.index')
            ->with('success',trans('dashboard::messages.create.success',['entity' => $request->name]));
    }

    public function edit(Entities\Language $language){

        $entity = $language;

        return view('dashboard::admin.languages.edit',compact('entity'));
    }

    public function update(Entities\Language $language, Requests\UpdateLanguageRequest $request){

        $language->update($request->all());

        return redirect()->route('admin.languages.index')
            ->with('success',trans('dashboard::messages.update.success',['entity' => $language->name]));
    }

    public function destroy(Entities\Language $language){

        $entityLabel = $language->name;
        $language->delete();

        return redirect()->route('admin.languages.index')
            ->with('success',trans('dashboard::messages.delete.success',['entity' => $entityLabel]));
    }

    public function datatable(Request $request)
    {

        $items = Entities\Language::query();

        return DataTables::eloquent($items)
            ->editColumn('name',function($record){
                return ($record->name)? $record->name: '---';
            })
            ->editColumn('flag',function($record){
                if($record->flag){
                    return '<img src="'.asset('images/flags/'.$record->flag).'" alt="'.$record->name.'"/>';
                } else {
                    return '---';
                }
            })
            ->addColumn(
                'actions',
                '<div class="btn-group pull-right">
                    <a href="{{ route(\'admin.languages.edit\', [$id]) }}" 
                    class="btn btn-success btn-xs legitRipple"><i class="icon-pencil6 position-left"></i> {{ trans(\'dashboard::buttons.edit\') }}</a>
                    <button type="button" 
                    class="btn btn-danger btn-xs legitRipple" 
                    data-toggle="modal" 
                    data-target="#modal_theme_danger"
                    data-action-target="{{ route(\'admin.languages.destroy\', [$id]) }}"><i class="icon-bin position-left"></i>{{ trans(\'dashboard::buttons.delete\') }}</button>
                </div>'
            )
            ->rawColumns(['actions','flag'])
            ->make(true);

    }
}
