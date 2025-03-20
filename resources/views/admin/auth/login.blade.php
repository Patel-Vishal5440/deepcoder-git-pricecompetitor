@extends('admin.layout.auth')
@section('title','Login')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">

                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <div class="w-lg-500px p-10">
                            <form class="form w-100" method="post" action="{{ route('admin.login.post') }}"
                                  id="login_form">

                                @csrf
                                <div class="text-center mb-8">
                                    <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">Your {{ config('app.name') }} Account
                                    </div>
                                </div>
                                <x-alert/>
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Email" name="email" autocomplete="off"
                                           class="form-control bg-transparent"
                                           value="{{old('email')}}"/>
                                    <x-error name="email"/>
                                </div>
                                <div class="fv-row mb-3">
                                    <div class="input-group mt-3" x-data="{showPassword:false}">
                                        <input type="password"
                                               placeholder="Password"
                                               name="password" autocomplete="off"
                                               class="form-control bg-transparent" id="password">
                                        <button type="button" class="input-group-text cursor-pointer" id="eyeButton">
                                            <i id="eye_icon" class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    <x-error name="password"/>
                                    <label class="error" id="password-error" for="password"></label>
                                    <p class="fs_14 mb-0 primary_color text-end">
{{--                                        <a href="{{ route('admin.password.request') }}">Forgot Password?</a>--}}
                                    </p>
                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        {{ __('admin.login.sign_in') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(() => {
            $('#login_form').validate({
                rules: {
                    email: {required: true, email: true},
                    password: {required: true}
                },
                messages: {
                    email: {required: 'Please enter email'},
                    password: {required: 'Please enter password'}
                }
            });
        })
        $('#eyeButton').on('click', function () {
            if ($('#password').attr('type') == 'text') {
                $('#password').attr('type', 'password')
                $('#eye_icon').attr('class', 'fa fa-eye')

            } else {
                $('#password').attr('type', 'text')
                $('#eye_icon').attr('class', 'fa fa-eye-slash')
            }
        });

    </script>
@endsection
