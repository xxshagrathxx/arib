@extends('layouts.master')

@section('page_title')
    {{ transWord('Profile') }}
@endsection
@section('title')
    {{ transWord('Update Profile') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('profile-update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="old_img" value="{{ $user->avatar }}">

                <div class="row">
                    <div class="col-9">

                        <div class="col-8 mb-3">
                            <div class="form-group">
                                <label for="name">{{ transWord('Name') }}<span class="is-required"> (*)</span></label>
                                <input type="text" class="form-control" name="name" placeholder="{{ transWord('Enter Name') }}" value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8 mb-3">
                            <div class="form-group">
                                <label for="password">{{ transWord('Password') }}</label>
                                <input type="password" class="form-control" name="password" placeholder="{{ transWord('Enter Password') }}" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <span class="text text-secondary" style="font-size: 11px">{{ transWord('Leave it empty if you do not want to change password') }}</span>
                        </div>

                        <div class="col-8 mb-3">
                            <div class="form-group">
                                <label for="password_confirmation">{{ transWord('Confirm Password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ transWord('Enter Confirm Password') }}" />
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8 mb-3">
                            <div class="form-group">
                                <label for="phone">{{ transWord('Phone') }}</label>
                                <input type="text" class="form-control" name="phone" placeholder="{{ transWord('Enter Phone') }}" value="{{ old('phone', $user->phone) }}" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8 mb-3">
                            <div class="form-group">
                                <label for="image">{{ transWord('Upload avatar here') }}</label>
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                            <span class="text text-secondary" style="font-size: 11px">{{ transWord('Image is preferred to be 300x300') }}</span>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <img src="{{ asset('uploads/users/'.$user->avatar) }}" style="width: 100%" alt="image" />
                    </div>
                </div>


                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('dashboard') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
