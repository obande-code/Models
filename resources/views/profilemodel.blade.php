@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class=" w-50 d-flex flex-column model_img_mobile">
        <div class="mt-2 d-flex flex-column model_img_mobile position-relative">
            <img src="{{ asset('image/download (26).png') }}" class="mt-2" alt="">
            <img src="{{ asset('image/download (74).png') }}" class="info_image" alt="">
            <a>
                <div class="d-flex justify-content-center image_middle">
                    <img src="{{ asset('image/download (27).png') }}" class="mt-2 w-25" alt="">
                </div>
            </a>
            <div class="d-flex justify-content-center">{{$model[0]->name}}</div>
        </div>
        <!-- <div class="d-flex mt-1">
            <button class="btn rounded-pill btn-outline-danger btn-sm">subscribe</button>
            <img src="{{ asset('image/download (46).png') }}" class="mx-1 chat_icon" alt="">
            <img src="{{ asset('image/download (37).png') }}" class="mx-1 chat_icon" alt="">
            <a href="/editprofile" class="ml-auto mx-1"><img src="{{ asset('image/download (69).png') }}"
                    class="setting_icon" alt=""></a>
        </div> -->
        <p>Hi Honey, do you want to be closer to me? Natural beauty without silicone. Subscribe to me, dear ones</p>
        <div class="row p-3">

            @foreach($posts as $post)
            <div class="position-relative col-lg-4 col-6 p-0">
                <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" class="col-12 p-0" alt="">
                @if($post->type == 'Free')
                <button class="btn btn-primary btn-sm rounded-pill btn_post post_badge">Free</button>
                @endif
                @if($post->type == 'Subscriber')
                <button class="btn btn-success btn-sm rounded-pill btn_post post_badge">Subscriber</button>
                @endif
                @if($post->type == 'Premium')
                <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post_badge">Premium</button>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection