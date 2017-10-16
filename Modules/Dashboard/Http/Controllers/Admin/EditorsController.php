<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Entities;
use Modules\Dashboard\Requests;
use Yajra\DataTables\Facades\DataTables;

class EditorsController extends Controller
{

    public function index()
    {
        return view('dashboard::admin.editors.index');
    }

    public function create(){
        return view('dashboard::admin.editors.create');
    }

    public function store(Requests\CreateEditorRequest $request){

        $editor = new Entities\Editor($request->all());
        $editor->save();

        $editor->expertise()->sync(array_get($request->all(),'expertise',[]));
        $editor->catTools()->sync(array_get($request->all(),'cat_tools',[]));
        $editor->sourceLanguages()->sync(array_get($request->all(),'source_languages',[]));
        $editor->targetLanguages()->sync(array_get($request->all(),'target_languages',[]));
        $editor->roles()->sync(array_get($request->all(),'roles',[]));

        return redirect()->route('admin.editors.index')
            ->with('success',trans('dashboard::messages.create.success',['entity' => $request->name]));
    }

    public function edit(Entities\Editor $editor){

        $entity = $editor;

        return view('dashboard::admin.editors.edit',compact('entity'));
    }

    public function update(Entities\Editor $editor, Requests\UpdateEditorRequest $request){

        $editor->update($request->all());

        $editor->expertise()->sync(array_get($request->all(),'expertise',[]));
        $editor->catTools()->sync(array_get($request->all(),'cat_tools',[]));
        $editor->sourceLanguages()->sync(array_get($request->all(),'source_languages',[]));
        $editor->targetLanguages()->sync(array_get($request->all(),'target_languages',[]));
        $editor->roles()->sync(array_get($request->all(),'roles',[]));

        return redirect()->route('admin.editors.index')
            ->with('success',trans('dashboard::messages.update.success',['entity' => $editor->name]));
    }

    public function destroy(Entities\Editor $editor){

        $entityLabel = $editor->name;
        $editor->delete();

        return redirect()->route('admin.editors.index')
            ->with('success',trans('dashboard::messages.delete.success',['entity' => $entityLabel]));
    }

    public function datatable(Request $request)
    {

        $items = Entities\Editor::query();

        return DataTables::eloquent($items)
            ->with('sourceLanguages')
            ->editColumn('name',function($record){
                return ($record->name)? $record->name: '---';
            })
            ->editColumn('sourceLanguages', function($record){
                $sourceLanguages = '';
                foreach ($record->sourceLanguages as $sourceLanguage){
                    $langTemplate = '<img src="'.asset('images/flags/'.$sourceLanguage->flag).'" alt="'.$sourceLanguage->name.'"/>';
                    $sourceLanguages .=$langTemplate;
                }
                return $sourceLanguages;
            })
            ->editColumn('targetLanguages', function($record){
                $targetLanguages = '';
                foreach ($record->targetLanguages as $targetLanguage){
                    $langTemplate = '<img src="'.asset('images/flags/'.$targetLanguage->flag).'" alt="'.$targetLanguage->name.'"/>';
                    $targetLanguages .=$langTemplate;
                }
                return $targetLanguages;
            })
            ->addColumn(
                'actions',
                '<div class="pull-right">
                    <a href="{{ route(\'admin.editors.edit\', [$id]) }}" 
                    class="btn btn-success btn-icon legitRipple"><i class="icon-pencil6"></i></a>
                    <button type="button" 
                    class="btn btn-danger btn-icon legitRipple" 
                    data-toggle="modal" 
                    data-target="#modal_theme_danger"
                    data-action-target="{{ route(\'admin.editors.destroy\', [$id]) }}"><i class="icon-bin"></i></button>
                </div>'
            )
            ->rawColumns(['actions','sourceLanguages', 'targetLanguages'])
            ->make(true);

    }
}
