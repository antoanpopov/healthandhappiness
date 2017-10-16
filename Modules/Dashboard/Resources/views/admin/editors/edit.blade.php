@extends('dashboard.layouts.main')
@section('pageTitle')
    {!! trans("dashboard::pages.editors.edit",['entity' => $entity->name]) !!}
@endsection
@section('headingElements')
    <div class="heading-btn-group">
        <a href="{{ route('admin.editors.index') }}"
           class="btn btn-default btn-xs legitRipple">
            <i class="icon-arrow-left16 position-left"></i> {{ trans('dashboard::buttons.back') }}
        </a>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
    <script>

        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        // Format icon
        function select2ImageFormat(image) {
            if (!image.id) {
                return image.text;
            }
            var $image = "<img src='" + $(image.element).data('image') + "' style='vertical-align:bottom;'/> " + image.text;

            return $image;
        }

        // Initialize with options
        $(".select-images").select2({
            templateResult: select2ImageFormat,
            templateSelection: select2ImageFormat,
            escapeMarkup: function (m) {
                return m;
            }
        });
    </script>
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin.editors.edit',$entity->name) !!}
@endsection
@section('content')
    <div class="panel panel-flat col-md-5">
        <div class="panel-body">
            {!! Form::open(['route' => ['admin.editors.update',$entity], 'action' => 'POST']) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        {!! Form::textType('name',trans('dashboard::fields.name'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::emailType('email',trans('dashboard::fields.email'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::textType('skype',trans('dashboard::fields.skype'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                    </div>
                    <div class="row">
                        {!! Form::textType('mobile',trans('dashboard::fields.telephone'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::textType('telephone',trans('dashboard::fields.mobile'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::textType('time_zone',trans('dashboard::fields.time-zone'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                    </div>
                    <div class="row">
                        {!! Form::textType('rate',trans('dashboard::fields.rate'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::textType('min_charge',trans('dashboard::fields.minimal-charge'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                        {!! Form::textType('experience',trans('dashboard::fields.experience'),$errors,$entity,['class' => 'col-md-4 col-sm-12']) !!}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="expertise">{{ trans('dashboard::fields.expertise') }}</label>
                            <select multiple="multiple" data-placeholder="{{ trans('dashboard::fields.expertise') }}"
                                    class="select" id="expertise" name="expertise[]">
                                @foreach(\Modules\Dashboard\Entities\Expertise::all() as $expertise)
                                    @foreach($entity->expertise as $entityExpertise)
                                        <option value="{{ $expertise->id }}"
                                                @if($entityExpertise->id == $expertise->id)selected="selected"@endif>{{ $expertise->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @if($errors->has('expertise'))
                                <label id="name-error" class="validation-error-label" for="expertise">
                                    {{$errors->first('expertise')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="roles">{{ trans('dashboard::fields.role') }}</label>
                            <select multiple="multiple" data-placeholder="{{ trans('dashboard::fields.role') }}"
                                    class="select" id="roles" name="roles[]">
                                @foreach(\Modules\Dashboard\Entities\Role::all() as $role)
                                    @foreach($entity->roles as $entityRole)
                                        <option value="{{ $role->id }}"
                                                @if($entityRole->id == $role->id)selected="selected"@endif>{{ $role->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @if($errors->has('flag'))
                                <label id="name-error" class="validation-error-label" for="cat_tools">
                                    {{$errors->first('flag')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="cat_tools">{{ trans('dashboard::fields.cat-tools') }}</label>
                            <select multiple="multiple" data-placeholder="{{ trans('dashboard::fields.cat-tools') }}"
                                    class="select" id="cat_tools" name="cat_tools[]">
                                @foreach(\Modules\Dashboard\Entities\CatTool::all() as $catTool)
                                    @foreach($entity->catTools as $entityCatTool)
                                        <option value="{{ $catTool->id }}"
                                                @if($entityCatTool->id == $catTool->id)selected="selected"@endif>{{ $catTool->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @if($errors->has('flag'))
                                <label id="name-error" class="validation-error-label" for="cat_tools">
                                    {{$errors->first('flag')}}</label>
                            @endif
                        </div>
                        {!! Form::languageSelect('source_languages',trans('dashboard::fields.target-languages'),$errors, $entity->sourceLanguages, ['class' =>'col-md-12']) !!}
                        {!! Form::languageSelect('target_languages',trans('dashboard::fields.target-languages'),$errors, $entity->targetLanguages, ['class' =>'col-md-12']) !!}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- /2 columns form -->
@endsection
