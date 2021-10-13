@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        @if(session('usertype') == 'model')
        <div class="col-10 col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <a class="back_login" href="/login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                            </svg>
                        </a>
                        <div class="form-group row justify-content-center">
                            <h5><span class="font-weight-bold">Model Sign-up</span></h5>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold mb-0">First Name</label>
                            <input type="text"
                                class="form-control signup_input @error('firstname') is-invalid @enderror"
                                id="firstname" placeholder="Type here" value="{{ old('firstname') }}" required
                                name="firstname" autocomplete="fistname" autofocus>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="font-weight-bold mb-0">Last Name</label>
                            <input type="text" class="form-control signup_input @error('lastname') is-invalid @enderror"
                                id="lastname" placeholder="Type here" value="{{ old('lastname') }}" required
                                name="lastname" autocomplete="lastname" autofocus>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="font-weight-bold mb-0">Birthdate</label>
                            <input type="date"
                                class="form-control signup_input @error('birthdate') is-invalid @enderror"
                                name="birthdate" id="birthdate" placeholder="Type here" value="{{ old('birthdate') }}"
                                required autocomplete="birthdate" autofocus>
                            @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nationality" class="font-weight-bold mb-0">Nationality</label>
                            <select id="nationality" name="nationality" class="form-control signup_input selectpicker countrypicker" data-live-search="true" data-default="United States" data-flag="true" required>
                                <option hidden>Choose one</option>
                            </select>
                            @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="referralcode" class="font-weight-bold mb-0">Referral Code</label>
                            <input type="text"
                                class="form-control signup_input @error('referralcode') is-invalid @enderror"
                                name="referralcode" id="referralcode" placeholder="Type here"
                                value="{{ old('referralcode') }}" required autocomplete="referralcode" autofocus>
                            @error('referralcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group upload_block">
                            <label class="font-weight-bold mb-0">Scanned Valid Government Issued
                                ID</label>
                            <label for="governmentid"
                                class="btn btn-login btn-success btn-block upload_label login_button">
                                {{ __('Upload') }}
                            </label>
                            <input type="file"
                                class="form-control upload_input signup_input @error('governmentid') is-invalid @enderror"
                                id="governmentid" placeholder="Type here" value="{{ old('governmentid') }}"
                                autocomplete="governmentid" autofocus>
                            @error('governmentid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold mb-0">User Name</label>
                            <input type="text" class="form-control signup_input @error('name') is-invalid @enderror"
                                id="name" placeholder="Type here" value="{{ old('name') }}" required autocomplete="name"
                                name="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold mb-0">Email Address</label>
                            <input id="email" type="email" placeholder="Type here"
                                class="form-control signup_input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold mb-0">Password</label>
                            <input id="password" type="password" placeholder="Type here"
                                class="form-control signup_input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold mb-0">Confirm Password</label>
                            <input id="password-confirm" placeholder="Type here" type="password"
                                class="form-control signup_input" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">I accept the Terms of Use</label>
                        </div>
                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                            <label class="custom-control-label" for="customCheck2">I accept the Privacy Policy</label>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="dd-grid gap-2 col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-login btn-success btn-block login_button">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if(session('usertype') == 'fan')
        <div class="col-10 col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <a class="back_login" href="/login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                            </svg>
                        </a>
                        <div class="form-group row justify-content-center">
                            <h5><span class="font-weight-bold">Fan Sign-up</span></h5>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold mb-0">First Name</label>
                            <input type="text"
                                class="form-control signup_input @error('firstname') is-invalid @enderror"
                                id="firstname" placeholder="Type here" value="{{ old('firstname') }}" required
                                name="firstname" autocomplete="fistname" autofocus>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="font-weight-bold mb-0">Last Name</label>
                            <input type="text" class="form-control signup_input @error('lastname') is-invalid @enderror"
                                id="lastname" placeholder="Type here" value="{{ old('lastname') }}" required
                                name="lastname" autocomplete="lastname" autofocus>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold mb-0">User Name</label>
                            <input type="text" class="form-control signup_input @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Type here" value="{{ old('name') }}" required
                                autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold mb-0">Email Address</label>
                            <input id="email" type="email" placeholder="Type here"
                                class="form-control signup_input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold mb-0">Password</label>
                            <input id="password" type="password" placeholder="Type here"
                                class="form-control signup_input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold mb-0">Confirm Password</label>
                            <input id="password-confirm" placeholder="Type here" type="password"
                                class="form-control signup_input" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">I accept the Terms of Use</label>
                        </div>
                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                            <label class="custom-control-label" for="customCheck2">I accept the Privacy Policy</label>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="dd-grid gap-2 col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-login btn-success btn-block login_button">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection