@extends('dashboard.layouts.main')
@section('pageTitle')
    {{trans("dashboard::pages.editors.index")}}
@endsection
@section('headingElements')
    <div class="heading-btn-group">
        <a href="{{ route('admin.editors.create') }}"
           class="btn btn-default btn-xs legitRipple">
            <i class="icon-file-plus position-left"></i> {{ trans('dashboard::buttons.add') }}
        </a>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages/datatables_data_sources.js')}}"></script>
    <script>
        $(function () {
            $('.datatable-ajax').DataTable({
                orderable: true,
                processing: true,
                ajax: '{{route('admin.editors.datatable')}}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'score', name: 'score'},
                    {data: 'sourceLanguages', name: 'source-language'},
                    {data: 'targetLanguages', name: 'target-language'},
                    {data: 'time_zone', name: 'time-zone'},
                    {data: 'rate', name: 'rate'},
                    {data: 'experience', name: 'experience'},
                    {data: 'actions', name: 'actions'}
                ]

            });

            $('.panel select').select2({
                minimumResultsForSearch: Infinity,
                width: 'auto'
            });

            $(document).on('submit', '#search-form', function (e) {
                dataTable.draw();
                e.preventDefault();

            });
        });
    </script>
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin.editors.index') !!}
@endsection
@section('content')
    <div class="panel panel-flat">
        <table class="table datatable-ajax">
            <thead>
            <tr>
                <th>{{ trans('dashboard::fields.name') }}</th>
                <th>{{ trans('dashboard::fields.email') }}</th>
                <th>{{ trans('dashboard::fields.score') }}</th>
                <th>{{ trans('dashboard::fields.source-languages') }}</th>
                <th>{{ trans('dashboard::fields.target-languages') }}</th>
                <th>{{ trans('dashboard::fields.time-zone') }}</th>
                <th>{{ trans('dashboard::fields.rate') }}</th>
                <th>{{ trans('dashboard::fields.experience') }}</th>
                <th class="text-right" data-sortable="false">Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="modal_theme_danger" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">{{ strtoupper(trans('dashboard::messages.delete.confirm-heading')) }}</h6>
                </div>

                <div class="modal-body">
                    <p>{{ trans('dashboard::messages.delete.confirm-text') }}</p>
                    <hr>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="display: inline-block;">{{ trans('dashboard::buttons.cancel') }}</button>

                    {!! Form::open(['method' => 'delete', 'style'=> 'display: inline-block;']) !!}
                    <button href="#" type="submit"
                            class="btn btn-danger">{{ trans('dashboard::buttons.delete') }}</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#modal_theme_danger').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var actionTarget = button.data('action-target');
                var modal = $(this);
                modal.find('form').attr('action', actionTarget);
            });
        });
    </script>
@endsection
