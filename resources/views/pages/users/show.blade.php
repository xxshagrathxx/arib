@extends('layouts.master')

@section('page_title')
    {{ transWord('Users') }}
@endsection
@section('title')
    {{ transWord('Show User') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body text-center">
            <img src="{{ asset('uploads/users/'.$user->avatar) }}" alt="">
            <br><br>
            <h6>{{ transWord('Name') }}: {{ $user->name }}</h3>
            <h6>{{ transWord('Email') }}: {{ $user->email }}</h3>
            <h6>{{ transWord('Role') }}: {{ $user->role->name }}</h3>

            <hr>
            <a href="{{ route('users.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
        </div>
    </div>
@endsection
