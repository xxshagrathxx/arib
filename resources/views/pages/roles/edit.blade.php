@extends('layouts.master')

@section('page_title')
    {{ transWord('Roles') }}
@endsection
@section('title')
    {{ transWord('Update Role') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="name">{{ transWord('Role Name') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="name" placeholder="{{ transWord('Enter Role Name') }}" value="{{ old('name', $role->name) }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('roles.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
