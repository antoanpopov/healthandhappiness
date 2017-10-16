@extends('dashboard.layouts.main')
@section('pageTitle')
    {!! trans("dashboard::pages.languages.edit",['entity' => $entity->name]) !!}
@endsection
@section('headingElements')
    <div class="heading-btn-group">
        <a href="{{ route('admin.languages.index') }}"
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
    {!! Breadcrumbs::render('admin.languages.edit',$entity->name) !!}
@endsection
@section('content')
    {!! Form::open(['route' => ['admin.languages.update',$entity], 'action' => 'POST']) !!}
    <input type="hidden" name="_method" value="PUT">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   placeholder="Country's name..."
                                   value="{{ $entity->name }}">
                            @if ($errors->has('name'))
                                <label id="name-error" class="validation-error-label" for="name">
                                    {{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Flag:</label>
                            <select data-placeholder="Select a state..." class="select-images" id="flag" name="flag">
                                @foreach(\Modules\Dashboard\Helpers\Images::getCountryFlags() as $countryFlag)
                                    @if ($entity->flag == $countryFlag['image'])
                                        <option value="{{ $countryFlag['image'] }}" data-image="{{ asset('/images/flags/'.$countryFlag['image']) }}" selected>{{ $countryFlag['name'] }}</option>
                                    @else
                                        <option value="{{ $countryFlag['image'] }}" data-image="{{ asset('/images/flags/'.$countryFlag['image']) }}">{{ $countryFlag['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('flag'))
                                <label id="name-error" class="validation-error-label" for="flag">
                                    {{$errors->first('flag')}}</label>
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
