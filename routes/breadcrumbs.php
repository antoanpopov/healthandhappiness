<?php
/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 4.10.2017 г.
 * Time: 19:54
 */
// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans("dashboard::pages.home.index"), route('admin.home.index'),['icon' => 'icon-home2']);
});
Breadcrumbs::register('admin.cat-tools.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans("dashboard::pages.cat-tools.index"), route('admin.cat-tools.index'),[]);
});
Breadcrumbs::register('admin.cat-tools.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.cat-tools.index');
    $breadcrumbs->push(trans("dashboard::pages.cat-tools.create"), route('admin.cat-tools.create'),[]);
});
Breadcrumbs::register('admin.cat-tools.edit', function ($breadcrumbs, $entity) {
    $breadcrumbs->parent('admin.cat-tools.index');
    $breadcrumbs->push(trans("dashboard::pages.cat-tools.edit",['entity' => $entity]), route('admin.cat-tools.create'),[]);
});


\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.expertise.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans("dashboard::pages.expertise.index"), route('admin.expertise.index'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.expertise.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.expertise.index');
    $breadcrumbs->push(trans("dashboard::pages.expertise.create"), route('admin.expertise.create'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.expertise.edit', function ($breadcrumbs, $entity) {
    $breadcrumbs->parent('admin.expertise.index');
    $breadcrumbs->push(trans("dashboard::pages.expertise.edit",['entity' => $entity]), route('admin.expertise.create'),[]);
});


\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.languages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans("dashboard::pages.languages.index"), route('admin.languages.index'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.languages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.expertise.index');
    $breadcrumbs->push(trans("dashboard::pages.languages.create"), route('admin.languages.create'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.languages.edit', function ($breadcrumbs, $entity) {
    $breadcrumbs->parent('admin.expertise.index');
    $breadcrumbs->push(trans("dashboard::pages.languages.edit",['entity' => $entity]), route('admin.languages.create'),[]);
});



\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.clients.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans("dashboard::pages.clients.index"), route('admin.clients.index'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.clients.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.clients.index');
    $breadcrumbs->push(trans("dashboard::pages.clients.create"), route('admin.clients.create'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.clients.edit', function ($breadcrumbs, $entity) {
    $breadcrumbs->parent('admin.clients.index');
    $breadcrumbs->push(trans("dashboard::pages.clients.edit",['entity' => $entity]), route('admin.clients.create'),[]);
});


\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.editors.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans("dashboard::pages.editors.index"), route('admin.editors.index'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.editors.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.editors.index');
    $breadcrumbs->push(trans("dashboard::pages.editors.create"), route('admin.editors.create'),[]);
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('admin.editors.edit', function ($breadcrumbs, $entity) {
    $breadcrumbs->parent('admin.editors.index');
    $breadcrumbs->push(trans("dashboard::pages.editors.edit",['entity' => $entity]), route('admin.editors.create'),[]);
});


\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('frontend.home.index',function ($breadcrumbs){
    $breadcrumbs->push(trans("frontend::pages.home.index"), route('frontend.home.index'));
});
\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::register('frontend.publications.index', function ($breadcrumbs) {
    $breadcrumbs->parent('frontend.home.index');
    $breadcrumbs->push(trans("frontend::pages.publications.index"), route('frontend.publications.index'),[]);
});
