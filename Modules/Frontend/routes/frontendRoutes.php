<?php
/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 4.10.2017 г.
 * Time: 8:25
 */

\Illuminate\Support\Facades\Route::get('/', [
    'as' => 'home.index',
    'uses' => 'HomeController@index',
]);
