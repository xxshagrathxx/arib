@extends('layouts.master')

@section('page_title')
    {{ transWord('Settings') }}
@endsection
@section('title')
    {{ transWord('Update Settings') }}
@endsection

@section('css')
    <style>
        .form-group{
            padding: 10px 0
        }
        h4 {
            margin: 20px auto
        }
    </style>
    <script src="{{asset('custom_js/upload-image.js')}}"></script>
@endsection

@section('content')
    <div class="card info-card pt-5 ps-3">
        <div class="card-body">
            <form action="{{ route('settings-update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="card col-5 m-4">
                        <div class="d-flex align-items-end row">
                            <div class="card-body">
                                <h4>{{ TransWord('Copyrights') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="copyrights_en">{{ transWord('Copyrights text english') }}</label>
                                    <input type="text" class="form-control" name="copyrights_en" placeholder="{{ transWord('Enter text') }}" value="{{ old('copyrights_ar', $settings['copyrights_en']) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="copyrights_ar">{{ transWord('Copyrights text arabic') }}</label>
                                    <input type="text" class="form-control" name="copyrights_ar" placeholder="{{ transWord('Enter text') }}" value="{{ old('copyrights_ar', $settings['copyrights_ar']) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="copyrights_en_lnk">{{ transWord('Copyrights link text english') }}</label>
                                    <input type="text" class="form-control" name="copyrights_en_lnk" placeholder="{{ transWord('Enter text') }}" value="{{ old('copyrights_en_lnk', $settings['copyrights_en_lnk']) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="copyrights_ar_lnk">{{ transWord('Copyrights link text arabic') }}</label>
                                    <input type="text" class="form-control" name="copyrights_ar_lnk" placeholder="{{ transWord('Enter text') }}" value="{{ old('copyrights_ar_lnk', $settings['copyrights_ar_lnk']) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="copyrights_lnk">{{ transWord('Copyrights hyper link') }}</label>
                                    <input type="text" class="form-control" name="copyrights_lnk" placeholder="{{ transWord('Enter hyper link') }}" value="{{ old('copyrights_lnk', $settings['copyrights_lnk']) }}" />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card col-5 m-4">
                        <div class="d-flex align-items-end row">
                            <div class="card-body">
                                <h4>{{ TransWord('Logo and Favicon') }}</h4>
                                <hr>

                                <img src="{{asset('uploads/logo/'.$settings['logo'])}}" alt="logo" class="d-block rounded" height="94" width="150" id="uploadedAvatar" />
                                <div class="form-group">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">{{ transWord('Upload logo here') }}</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input class="form-control account-file-input" type="file" name="logo" id="upload" hidden>
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">{{ transWord('Reset') }}</span>
                                    </button>
                                </div>
                                <span class="text text-secondary" style="font-size: 11px">{{ transWord('Logo is preferred to be 150x94') }}</span>
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group">
                                    <label for="favicon">{{ transWord('Upload favicon here') }}</label>
                                    <input class="form-control" type="file" name="favicon">
                                </div>
                                <span class="text text-secondary" style="font-size: 11px">{{ transWord('Favicon is preferred to be 32x32') }}</span>
                                @error('favicon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card col-5 m-4">
                        <div class="d-flex align-items-end row">
                            <div class="card-body">
                                <h4>{{ TransWord('Contact us settings') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="contact_us_to_email">{{ transWord('Contact us to email') }}</label>
                                    <input type="text" class="form-control" name="contact_us_to_email" placeholder="{{ transWord('Enter contact us to email') }}" value="{{ old('contact_us_to_email', $settings['contact_us_to_email']) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="contact_us_subject">{{ transWord('Contact us email subject') }}</label>
                                    <input type="text" class="form-control" name="contact_us_subject" placeholder="{{ transWord('Enter contact us email subject') }}" value="{{ old('contact_us_subject', $settings['contact_us_subject']) }}" />
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="card col-5 m-4">
                        <div class="d-flex align-items-end row">
                            <div class="card-body">
                                <h4>{{ TransWord('Logo') }}</h4>
                                <hr>
                                gjkhj
                            </div>
                        </div>
                    </div> --}}
                </div>

                <hr>
                <button type="submit" class="btn btn-round btn-success col-md-1 me-2">{{ transWord('Save') }}</button>
                <a href="{{ route('dashboard') }}" style="width: 200px" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> {{ transWord('Back') }}</a>
            </form>
        </div>
    </div>
@endsection
