@extends('layouts.master')

@section('page_title')
    {{ transWord('Translation') }}
@endsection
@section('title')
    {{ transWord('Translation') }}
@endsection

@section('css')
    <style>
        h6 {
            font-size: 17px !important
        }
    </style>
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('translates-store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="word" placeholder="{{ transWord('Word') }}"
                        required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="translation"
                        placeholder="{{ transWord('Translation') }}" required>
                </div>
                <button type="submit" class="btn btn-round btn-success col-md-1">{{ transWord('Save') }}</button>
            </form>
        </div>
    </div>
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('translates-update') }}" method="POST">
                @csrf

                <div class="row p-3">
                    @foreach ($langs as $index => $lang)
                        <div class="col-lg-4 pb-5">
                            <h6>{{ $lang->word }}</h6>
                            <input type="hidden" name="ids[]" value="{{ $lang->id }}">
                            <div class="row">
                                <div class="col-8">
                                    <h6><input type="text" name="trans[]" value="{{ $lang->translation }}"
                                        class="form-control"></h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('translates-delete', $lang->id) }}" id="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (count($langs) > 0)
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <button type="submit" class="btn btn-primary col-md-2"><i
                                    class="fa fa-save"></i>&nbsp;{{ transWord('Save') }}</button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
