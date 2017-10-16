@extends('dashboard.layouts.main')
@section('pageTitle')
    {!! trans("dashboard::pages.expertise.edit",['entity' => $entity->name]) !!}
@endsection
@section('headingElements')
    <div class="heading-btn-group">
        <a href="{{ route('admin.expertise.index') }}"
           class="btn btn-default btn-xs legitRipple">
            <i class="icon-arrow-left16 position-left"></i> {{ trans('dashboard::buttons.back') }}
        </a>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin.expertise.edit',$entity->name) !!}
@endsection
@section('content')
    {!! Form::open(['route' => ['admin.expertise.update',$entity], 'action' => 'POST']) !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="CAT Tool's name..."
                                       value="{{ $entity->name }}">
                                @if ($errors->has('name'))
                                    <label id="name-error" class="validation-error-label" for="name">
                                        {{$errors->first('name')}}</label>
                                @endif
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard::buttons.update') }} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <!-- /2 columns form -->
@endsection
