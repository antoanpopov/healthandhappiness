@extends('dashboard.layouts.main')
@section('pageTitle')
    {{trans("dashboard::pages.expertise.index")}}
@endsection
@section('headingElements')
    <div class="heading-btn-group">
        <a href="{{ route('admin.expertise.create') }}"
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
                ajax: '{{route('admin.expertise.datatable')}}',
                columns: [
                    {data: 'name', name: 'name'},
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
    {!! Breadcrumbs::render('admin.expertise.index') !!}
@endsection
@section('content')
    <div class="panel panel-flat">
        <table class="table datatable-ajax">
            <thead>
            <tr>
                <th>Name</th>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard::buttons.cancel') }}</button>

                    {!! Form::open(['method' => 'delete']) !!}
                    <button href="#" type="submit" class="btn btn-danger">{{ trans('dashboard::buttons.delete') }}</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            $('#modal_theme_danger').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var actionTarget = button.data('action-target');
                var modal = $(this);
                modal.find('form').attr('action', actionTarget);
            });
        });
    </script>
@endsection
