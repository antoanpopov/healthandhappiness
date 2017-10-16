<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('dashboard::admin.home.index');
    }
}
