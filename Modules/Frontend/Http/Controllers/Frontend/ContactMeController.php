<?php
/**
 * Created by PhpStorm.
 * User: AntoanPopoff
 * Date: 16.10.2017 г.
 * Time: 12:30
 */
namespace Modules\Frontend\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ContactMeController extends Controller
{

    public function index()
    {
        return view('frontend::pages.contact-me.index');
    }
}
