@extends('layouts.dashboard')
@section('style')
@endsection
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <img src="{{ asset('image/download (65).png') }}" class="w-75 maincontent_img" alt="">
    <div class="w-75 d-flex mt-3 justify-content-between models_round_img_container">
        <div class="mx-1">
            <img src="{{ asset('image/download (10).png') }}" class="model_round_img" alt="">
            <div class="d-flex justify-content-center">Miyuki</div>
        </div>
        <div class="mx-1">
            <img src="{{ asset('image/download (11).png') }}" class="model_round_img" alt="">
            <div class="d-flex justify-content-center">
                Rachel Cruz
            </div>
        </div>
        <div class="mx-1">
            <img src="{{ asset('image/download (12).png') }}" class="model_round_img" alt="">
            <div class="d-flex justify-content-center">Jenny Choy</div>
        </div>
        <div class="mx-1">
            <img src="{{ asset('image/download (13).png') }}" class="model_round_img" alt="">
            <div class="d-flex justify-content-center">Rachel Cruz</div>
        </div>
        <div class="mx-1">
            <img src="{{ asset('image/download (14).png') }}" class="model_round_img" alt="">
            <div class="d-flex justify-content-center">Miyuki </div>
        </div>
    </div>
    <img src="{{ asset('image/download (15).png') }}" class="w-75 mt-3 px-3 maincontent_img" alt="">
    <img src="{{ asset('image/download (15).png') }}" class="w-75 mt-3 px-3 maincontent_img" alt="">
</div>
@endsection
@section('script')
@endsection
