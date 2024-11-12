@extends('layouts.master')
@section('page_title')
    {{ transWord('Dashboard') }}
@endsection
@section('title')
    {{ transWord('Dashboard') }}
@endsection
@section('content')
    <div class="card info-card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                @if (auth()->user()->id == 2 && auth()->user()->password_changed == 0)
                    <div class="m-3">
                        <h2 class="text text-danger">{{ transWord('Please change password for security') }}</h2>
                        <span>{{ transWord('Go to profile here: ') }}<a href="{{ route('profile-edit') }}">{{ transWord('My Profile') }}</a></span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
