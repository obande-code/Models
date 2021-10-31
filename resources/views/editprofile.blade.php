@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('saveprofile') }}" enctype="multipart/form-data">
                        @csrf
                        <a class="back_login" href="/userprofile">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                            </svg> -->
                        </a>
                        <div class="form-group row justify-content-center">
                            <h5><span class="font-weight-bold">Edit Profile</span></h5>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold mb-0">First Name</label>
                            <input type="text" disabled
                                class="form-control signup_input @error('firstname') is-invalid @enderror"
                                id="firstname" placeholder="Type here" value="{{$user[0]->firstname}}" required
                                name="firstname" autocomplete="fistname" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="font-weight-bold mb-0">Last Name</label>
                            <input type="text" disabled
                                class="form-control signup_input @error('lastname') is-invalid @enderror" id="lastname"
                                placeholder="Type here" value="{{$user[0]->lastname}}" required name="lastname"
                                autocomplete="lastname" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nationality" class="font-weight-bold mb-0">Nationality</label>
                            <input type="text" disabled
                                class="form-control signup_input @error('nationality') is-invalid @enderror"
                                name="nationality" id="nationality" placeholder="Type here"
                                value="{{$user[0]->nationality}}" required autocomplete="nationality" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="font-weight-bold mb-0">Birthdate</label>
                            <input type="text" disabled
                                class="form-control signup_input @error('birthdate') is-invalid @enderror"
                                name="birthdate" id="birthdate" placeholder="Type here" value="{{$user[0]->birthdate}}"
                                required autocomplete="birthdate" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold mb-0">Email Address</label>
                            <input id="email" type="email" placeholder="Type here" disabled
                                class="form-control signup_input @error('email') is-invalid @enderror" name="email"
                                value="{{$user[0]->email}}" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold mb-0">Password</label>
                            <input id="password" type="password" placeholder="Type here" disabled
                                class="form-control signup_input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="referralcode" class="font-weight-bold mb-0">Referral Code</label>
                            <input type="text" disabled
                                class="form-control signup_input @error('referralcode') is-invalid @enderror"
                                name="referralcode" id="referralcode" placeholder="Type here"
                                value="{{$user[0]->referralcode}}" required autocomplete="referralcode" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nationality" class="font-weight-bold mb-0">Description</label>
                            <input type="text"
                                class="form-control signup_input @error('description') is-invalid @enderror"
                                name="description" id="Description" placeholder="Type here"
                                value="{{$profile[0]->description}}" required autocomplete="description" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="font-weight-bold mb-0">Facebook</label>
                            <input type="text" class="form-control signup_input @error('facebook') is-invalid @enderror"
                                name="facebook" id="facebook" placeholder="Type here" value="{{$profile[0]->facebook}}"
                                required autocomplete="facebook" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="instagram" class="font-weight-bold mb-0">Instagram</label>
                            <input type="text"
                                class="form-control signup_input @error('instagram') is-invalid @enderror"
                                name="instagram" id="instagram" placeholder="Type here"
                                value="{{$profile[0]->instagram}}" required autocomplete="instagram" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="subscriptionfee" class="font-weight-bold mb-0">Subscription Fee</label>
                            <input type="text"
                                class="form-control signup_input @error('subscriptionfee') is-invalid @enderror"
                                name="subscriptionfee" id="subscriptionfee" placeholder="Type here"
                                value="{{$profile[0]->subscriptionfee}}" required autocomplete="subscriptionfee"
                                autofocus>
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
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="dd-grid gap-2 col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-login btn-success btn-block login_button">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection