@extends('layouts.master')

@section('page_title')
    {{ transWord('Users') }}
@endsection
@section('title')
    {{ transWord('Create User') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="name">{{ transWord('Name') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="name" placeholder="{{ transWord('Enter Name') }}" value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="email">{{ transWord('Email') }}<span class="is-required"> (*)</span></label>
                        <input type="email" class="form-control" name="email" placeholder="{{ transWord('Enter Email') }}" value="{{ old('email') }}" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="password">{{ transWord('Password') }}<span class="is-required"> (*)</span></label>
                        <input type="password" class="form-control" name="password" placeholder="{{ transWord('Enter Password') }}" />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="password_confirmation">{{ transWord('Confirm Password') }}<span class="is-required"> (*)</span></label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ transWord('Enter Confirm Password') }}" />
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="phone">{{ transWord('Phone') }}</label>
                        <input type="text" class="form-control" name="phone" placeholder="{{ transWord('Enter Phone') }}" />
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="role_id">{{ transWord('Role') }}<span class="is-required">(*)</span></label>
                        <select name="role_id" id="role_id" class="form-select">
                            <option value="" selected="" disabled="">{{ transWord('Select Role') }}</option>
                            @foreach ($roles as $role)
                                @php
                                    if ($role->id == 1) // To skip assiging a Super Admin
                                        continue;
                                @endphp
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="image">{{ transWord('Upload avatar here') }}</label>
                        <input class="form-control" type="file" name="image">
                        <span class="text text-primary" style="font-size: 13px">{{ transWord('Image is preferred to be 300x300') }}</span>
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('users.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
