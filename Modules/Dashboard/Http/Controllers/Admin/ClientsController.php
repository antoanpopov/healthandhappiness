<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Entities;
use Modules\Dashboard\Requests;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{

    public function index()
    {
        return view('dashboard::admin.clients.index');
    }

    public function datatable(Request $request)
    {

        $items = Entities\Client\Client::query();

        return DataTables::eloquent($items)
            ->editColumn('name',function($record){
                return ($record->name)? $record->name: '---';
            })
            ->addColumn(
                'actions',
                '<div class="btn-group pull-right">
                    <a href="{{ route(\'admin.clients.edit\', [$id]) }}" 
                    class="btn btn-success btn-xs legitRipple"><i class="icon-pencil6 position-left"></i> {{ trans(\'dashboard::buttons.edit\') }}</a>
                    <button type="button" 
                    class="btn btn-danger btn-xs legitRipple" 
                    data-toggle="modal" 
                    data-target="#modal_theme_danger"
                    data-action-target="{{ route(\'admin.clients.destroy\', [$id]) }}"><i class="icon-bin position-left"></i>{{ trans(\'dashboard::buttons.delete\') }}</button>
                </div>'
            )
            ->rawColumns(['actions'])
            ->make(true);

    }
}
