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

\Illuminate\Support\Facades\Route::get('cat-tools/datatable', 'CatToolsController@datatable',[])->name('cat-tools.datatable');
\Illuminate\Support\Facades\Route::get('expertise/datatable', 'ExpertiseController@datatable',[])->name('expertise.datatable');
\Illuminate\Support\Facades\Route::get('languages/datatable', 'LanguagesController@datatable',[])->name('languages.datatable');
\Illuminate\Support\Facades\Route::get('clients/datatable', 'ClientsController@datatable',[])->name('clients.datatable');
\Illuminate\Support\Facades\Route::get('editors/datatable', 'EditorsController@datatable',[])->name('editors.datatable');
\Illuminate\Support\Facades\Route::resource('cat-tools', 'CatToolsController',[]);
\Illuminate\Support\Facades\Route::resource('clients', 'ClientsController',[]);
\Illuminate\Support\Facades\Route::resource('editors', 'EditorsController',[]);
\Illuminate\Support\Facades\Route::resource('expertise', 'ExpertiseController',[]);
\Illuminate\Support\Facades\Route::resource('languages', 'LanguagesController',[]);
\Illuminate\Support\Facades\Route::group([
    'as' => 'jobs.',
    'prefix' => 'jobs',
    'namespace' => 'Jobs',
],function(){
    \Illuminate\Support\Facades\Route::resource('protext-translations', 'ProtextTranslationsController',[]);
    \Illuminate\Support\Facades\Route::resource('translations-team', 'TranslationsTeamController',[]);
});
