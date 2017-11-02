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

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.about-me.index')), [
    'as' => 'about-me.index',
    'uses' => 'AboutMeController@index',
]);

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.publications.index')), [
    'as' => 'publications.index',
    'uses' => 'PublicationsController@index',
]);

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.publications.index')).'/{slug}', [
    'as' => 'publications.detail',
    'uses' => 'PublicationsController@detail',
]);

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.activities.index')), [
    'as' => 'activities.index',
    'uses' => 'ActivitiesController@index',
]);

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.consultations.index')), [
    'as' => 'consultations.index',
    'uses' => 'ConsultationsController@index',
]);

\Illuminate\Support\Facades\Route::get(str_slug(trans('frontend::pages.contact-me.index')), [
    'as' => 'contact-me.index',
    'uses' => 'ContactMeController@index',
]);

\Menu::make('main', function($menu){

    $menu->add(trans('frontend::pages.home.index'),     ['route'  => 'frontend.home.index']);
    $menu->add(trans('frontend::pages.about-me.index'),     ['route'  => 'frontend.about-me.index']);
    $menu->add(trans('frontend::pages.publications.index'),     ['route'  => 'frontend.publications.index']);
    $menu->add(trans('frontend::pages.activities.index'),     ['route'  => 'frontend.activities.index']);
    $menu->add(trans('frontend::pages.consultations.index'),     ['route'  => 'frontend.consultations.index']);
    $menu->add(trans('frontend::pages.contact-me.index'),     ['route'  => 'frontend.contact-me.index']);

});
