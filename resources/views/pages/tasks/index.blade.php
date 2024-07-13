@extends('layouts.master')

@section('page_title')
    {{ transWord('Tasks') }}
@endsection
@section('title')
    {{ transWord('Tasks') }}
@endsection

@section('content')
    <div class="card info-card pt-3 ps-3">
        <div class="card-body">
            <div class="row">
                @can('create_tasks')
                    @if (auth()->user()->employee->parent_id == null)
                        <div class="col-12">
                            <div class="text-end">
                                <a href="{{ route('tasks.create') }}" class="btn btn-success">{{ transWord('Create New') }}</a>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>
            <hr>
            <div class="datatable-container">
                <table id="datatable" class="yajra-datatable table datatable datatable-table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 1%;">#</th>
                            <th>{{ transWord('Name') }}</th>
                            <th>{{ transWord('Status') }}</th>
                            <th class="text-end">{{ transWord('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{-- <div class="col-4">
                <a href="{{ route('users-all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
            </div> --}}
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ app()->getLocale() == 'ar' ? asset('nice-admin/assets/js/ar.json') : '' }}',
                    "processing": '<i class="fas fa-circle-notch fa-spin fa-3x" style="color: #4154F1"></i>',
                    "paginate": {
                        "first": '<i class="fas fa-angle-double-left"></i>',
                        "last": '<i class="fas fa-angle-double-right"></i>',
                        "next": '<i class="fas fa-angle-right"></i>',
                        "previous": '<i class="fas fa-angle-left"></i>'
                    },
                },
                ajax: "{{ route('tasks.all') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endsection
