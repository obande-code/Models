@extends('layouts.app')

@section('content')
<div class="web_img">
    <div class="d-flex">
        <div>
            <img class="img-fluid" src="{{ asset('image/download.png') }}" alt="">
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('image/download (1).png') }}" alt="">
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('image/download (2).png') }}" alt="">
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('image/download (3).png') }}" alt="">
        </div>
        <div>
            <img class="img-fluid" src="{{ asset('image/download (5).png') }}" alt="">
        </div>
    </div>
</div>
<div class="mobile_img">
    <div>
        <img class="w-100" src="{{ asset('image/download (1).png') }}" alt="">
    </div>
</div>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div>
                <form method="POST" class="login_form" action="{{ route('login') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <img src="{{ asset('image/download (6).png') }}" class="img-fluid" alt="...">
                        <div class="d-flex flex-column justify-content-center">
                            <img src="{{ asset('image/download (7).png') }}" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <div style="margin-top: -50px" class="form-group row justify-content-center">
                        <h5>F<span style="color: white">ind Conn</span>ect Communicate</h5>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 input-group">
                            <input id="email" type="email" placeholder="Email or Username"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 input-group">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control border-right-0 border @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                            <span class="input-group-append">
                                <div class="input-group-text bg-transparent border-left-0 border"><img
                                        src="{{ asset('image/download (30).png') }}" class="img-fluid" alt="..."></div>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="dd-grid gap-2 col-md-8 justify-content-center">
                            <button type="submit" class="btn btn-login btn-block text-light login_button">
                                {{ __('LOG-IN') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center mb-3 mt-4">
                        <div class="col-md-8  d-flex">
                            <div style="height: 1px; background-color: black; width: 45%"></div>
                            <div>
                                <div style="margin-top: -10px" class="mx-1"> OR </div>
                            </div>
                            <div style="height: 1px; background-color: black; width: 45%"></div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="dd-grid gap-2 col-md-8 justify-content-center">
                            <a type="submit" href="/fan/signup" class="btn btn-login btn-block text-light login_button">
                                {{ __('Fan Sign-up') }}
                            </a>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="dd-grid gap-2 col-md-8 justify-content-center">
                            <a type="submit" href="/model/signup"
                                class="btn btn-login btn-block text-light login_button">
                                {{ __('Model Sign-up') }}
                            </a>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center login_form_footer">
                        <div class=" col-md-8 d-flex justify-content-around">
                            <img src="{{ asset('image/download (8).png') }}" class="footer_img" alt="">
                            <h6 class="d-flex flex-column justify-content-center footer_text">Copyright &copy; 2021
                                OHAIII</h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection