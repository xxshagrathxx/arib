@extends('layouts.master')

@section('page_title')
    {{ transWord('Tasks') }}
@endsection
@section('title')
    {{ transWord('Update Task') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('tasks-update', $task->id) }}" method="post">
                @csrf

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="status">{{ transWord('Status') }}<span class="is-required">(*)</span></label>
                        <select name="status" id="status" class="form-select">
                            <option value="" selected="" disabled="">{{ transWord('Select Status') }}</option>
                            <option value="Backlog" {{ $task->status == 'Backlog' ? 'selected' : '' }}>Backlog</option>
                            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}>Done</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('tasks.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
