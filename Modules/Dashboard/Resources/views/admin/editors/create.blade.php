@extends('dashboard.layouts.main')
@section('pageTitle')
    {{trans("dashboard::pages.editors.create")}}
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
    {!! Breadcrumbs::render('admin.editors.create') !!}
@endsection
@section('content')
    {!! Form::open(['route' => 'admin.editors.store', 'action' => 'POST']) !!}
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="name">{{ trans('dashboard::fields.name') }}</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.name') }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <label id="name-error" class="validation-error-label" for="name">
                                    {{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">{{ trans('dashboard::fields.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.email') }}" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <label id="name-error" class="validation-error-label" for="email">
                                    {{$errors->first('email')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="skype">{{ trans('dashboard::fields.skype') }}</label>
                            <input type="text" id="skype" name="skype" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.skype') }}" value="{{ old('skype') }}">
                            @if ($errors->has('skype'))
                                <label id="name-error" class="validation-error-label" for="skype">
                                    {{$errors->first('skype')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="telephone">{{ trans('dashboard::fields.telephone') }}</label>
                            <input type="text" id="telephone" name="telephone" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.telephone') }}"
                                   value="{{ old('telephone') }}">
                            @if ($errors->has('telephone'))
                                <label id="name-error" class="validation-error-label" for="telephone">
                                    {{$errors->first('telephone')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="mobile">{{ trans('dashboard::fields.mobile') }}</label>
                            <input type="text" id="mobile" name="mobile" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.mobile') }}" value="{{ old('mobile') }}">
                            @if ($errors->has('mobile'))
                                <label id="name-error" class="validation-error-label" for="mobile">
                                    {{$errors->first('mobile')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="time_zone">{{ trans('dashboard::fields.time-zone') }}</label>
                            <input type="text" id="time_zone" name="time_zone" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.time-zone') }}"
                                   value="{{ old('time_zone') }}">
                            @if ($errors->has('time_zone'))
                                <label id="name-error" class="validation-error-label" for="time_zone">
                                    {{$errors->first('time_zone')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="rate">{{ trans('dashboard::fields.rate') }}</label>
                            <input type="text" id="rate" name="rate" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.rate') }}" value="{{ old('rate') }}">
                            @if ($errors->has('rate'))
                                <label id="name-error" class="validation-error-label" for="rate">
                                    {{$errors->first('rate')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="min_charge">{{ trans('dashboard::fields.minimal-charge') }}</label>
                            <input type="text" id="min_charge" name="min_charge" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.minimal-charge') }}"
                                   value="{{ old('min_charge') }}">
                            @if ($errors->has('min_charge'))
                                <label id="name-error" class="validation-error-label" for="min_charge">
                                    {{$errors->first('min_charge')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="min_charge">{{ trans('dashboard::fields.experience') }}</label>
                            <input type="text" id="experience" name="experience" class="form-control"
                                   placeholder="{{ trans('dashboard::fields.experience') }}"
                                   value="{{ old('experience') }}">
                            @if ($errors->has('experience'))
                                <label id="name-error" class="validation-error-label" for="experience">
                                    {{$errors->first('experience')}}</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="expertise">{{ trans('dashboard::fields.expertise') }}</label>
                            <select multiple="multiple" data-placeholder="{{ trans('dashboard::fields.expertise') }}"
                                    class="select" id="expertise" name="expertise[]">
                                @foreach(\Modules\Dashboard\Entities\Expertise::all() as $expertise)
                                    <option value="{{ $expertise->id }}">{{ $expertise->name }}</option>
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
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                    <option value="{{ $catTool->id }}">{{ $catTool->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('flag'))
                                <label id="name-error" class="validation-error-label" for="cat_tools">
                                    {{$errors->first('flag')}}</label>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="source_languages">{{ trans('dashboard::fields.source-languages') }}</label>
                            <select id="source_languages" name="source_languages[]" multiple="multiple"
                                    data-placeholder="Source Languages" class="select-images">
                                @foreach(\Modules\Dashboard\Entities\Language::all() as $language)
                                    <option value="{{ $language->id }}"
                                            data-image="{{ asset('/images/flags/'.$language->flag) }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="target_languages">{{ trans('dashboard::fields.target-languages') }}</label>
                            <select id="target_languages" name="target_languages[]" multiple="multiple"
                                    data-placeholder="..." class="select-images">
                                @foreach(\Modules\Dashboard\Entities\Language::all() as $language)
                                    <option value="{{ $language->id }}"
                                            data-image="{{ asset('/images/flags/'.$language->flag) }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <!-- /2 columns form -->
@endsection
