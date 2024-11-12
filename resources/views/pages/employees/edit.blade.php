@extends('layouts.master')

@section('page_title')
    {{ transWord('Employees') }}
@endsection
@section('title')
    {{ transWord('Update Employee') }}
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('employees-update', $employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="old_img" value="{{ $employee->user->avatar }}">

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="first_name">{{ transWord('First Name') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="first_name" placeholder="{{ transWord('Enter First Name') }}" value="{{ old('first_name', $employee->first_name) }}" />
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="last_name">{{ transWord('Last Name') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="{{ transWord('Enter Last Name') }}" value="{{ old('last_name', $employee->last_name) }}" />
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="salary">{{ transWord('Salary') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="salary" placeholder="{{ transWord('Enter Salary') }}" value="{{ old('salary', $employee->salary) }}" />
                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="department_id">{{ transWord('Department') }}<span class="is-required">(*)</span></label>
                        <select name="department_id" id="department_id" class="form-select">
                            <option value="" selected="" disabled="">{{ transWord('Select Department') }}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="parent_id">{{ transWord('Manager') }}</label>
                        <select name="parent_id" id="parent_id" class="form-select">
                            <option value="" selected="" disabled="">{{ transWord('Select Manager') }}</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}" {{ $manager->id == $employee->parent_id ? 'selected' : '' }}>{{ $manager->user->name }}</option>
                            @endforeach
                        </select>
                        <span class="text text-primary" style="font-size: 12px">Leave this if the employee is a manager</span>
                        @error('parent_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>

                <h1>User's Data</h1>

                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="name">{{ transWord('Name') }}<span class="is-required"> (*)</span></label>
                        <input type="text" class="form-control" name="name" placeholder="{{ transWord('Enter Name') }}" value="{{ old('name', $employee->user->name) }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="email">{{ transWord('Email') }}<span class="is-required"> (*)</span></label>
                        <input type="email" class="form-control" name="email" placeholder="{{ transWord('Enter Email') }}" value="{{ old('email', $employee->user->email) }}" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="password">{{ transWord('Password') }}</label>
                        <input type="password" class="form-control" name="password" placeholder="{{ transWord('Enter Password') }}" />
                        <span class="text text-primary" style="font-size: 12px">Leave blank if you don't want to change the password</span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="password_confirmation">{{ transWord('Confirm Password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ transWord('Enter Confirm Password') }}" />
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group">
                        <label for="phone">{{ transWord('Phone') }}</label>
                        <input type="text" class="form-control" name="phone" placeholder="{{ transWord('Enter Phone') }}" value="{{ old('phone', $employee->user->phone) }}" />
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
                                <option value="{{ $role->id }}" {{ $role->id == $employee->user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3 me-2">
                        <div class="form-group">
                            <label for="image">{{ transWord('Upload avatar here') }}</label>
                            <input class="form-control" type="file" name="image">
                            <span class="text text-primary" style="font-size: 13px">{{ transWord('Image is preferred to be 300x300') }}</span>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <img src="{{ asset('uploads/users/'.$employee->user->avatar) }}" width="100" alt="">
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('employees.all') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
