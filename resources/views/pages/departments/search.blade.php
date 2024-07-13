@extends('layouts.master')

@section('page_title')
    {{ transWord('Departments Search') }}
@endsection
@section('title')
    {{ transWord('Departments Search') }}
@endsection

@section('content')
    <div class="card info-card pt-3 ps-3">
        <div class="card-body">
            <div class="datatable-container">
                <table id="datatable" class="yajra-datatable table datatable datatable-table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 1%;">#</th>
                            <th>{{ transWord('Name') }}</th>
                            <th>{{ transWord('Count') }}</th>
                            <th>{{ transWord('Sum Of Salaries') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $result->department_name }}</td>
                                <td>{{ $result->employee_count }}</td>
                                <td>{{ $result->total_salaries }}</td>
                            </tr>

                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <a href="{{ route('departments.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
@endsection
