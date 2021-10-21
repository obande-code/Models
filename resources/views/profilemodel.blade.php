@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class=" w-75 d-flex flex-column model_img_mobile">
        <div class="mt-2 d-flex flex-column model_img_mobile position-relative">
            <form method="POST" id="cover" action="{{ route('cover') }}" enctype="multipart/form-data" style="height: 0">
                @csrf    
                <input type="file" name="cover_img" onchange="uploadcover()" enctype="multipart/form-data" style="visibility: hidden; height: 0" id="cover_img">
            </form>
            <form method="POST" id="profile" action="{{ route('profile') }}" enctype="multipart/form-data" style="height: 0">
                @csrf   
                <input type="file" name="user_img" onchange="uploadprofile()" enctype="multipart/form-data" style="visibility: hidden; height: 0" id="user_img">
            </form>
            <!-- @if($model[0]->cover == NULL)
            <img src="{{ asset('image/download (26).png') }}" class="mt-2" alt="">
            @endif -->
            @if($model[0]->cover != NULL)
            <img src="{{asset('storage/uploads/' .$model[0]->cover. '')}}" class="mt-2" style="height: 12vw" alt="">
            @endif
            <img src="{{ asset('image/download (74).png') }}" class="info_image" alt="">
            <p class="change-cover text-light" onclick="changecover()">Change Cover</p>
            <a>
                <div class="image_middle">
                    @if($model[0]->profile == NULL)
                    <img src="{{ asset('image/cat5.jpg') }}" class="w-100 user-image" alt="">
                    @endif
                    @if($model[0]->profile != NULL)
                    <img src="{{asset('storage/uploads/' .$model[0]->profile. '')}}" class="w-100 user-image" alt="">
                    @endif
                    <p class="change-user text-light" onclick="changeuser()">Change<br>Profile</p>
                </div>
            </a>
            <div class="d-flex justify-content-center">{{$model[0]->name}}</div>
        </div>
        <div class="d-flex mt-1">
            <a href="/editprofile" class="ml-auto mx-1"><img src="{{ asset('image/download (69).png') }}"
                    class="setting_icon" alt=""></a>
        </div>
        <p>Hi Honey, do you want to be closer to me? Natural beauty without silicone. Subscribe to me, dear ones</p>
        <div class="row p-3">

            @foreach($posts as $post)
            <div class="position-relative col-lg-4 col-6 p-0 overflow-hidden d-flex">
                @if($post->type == 'Free')
                <div class="img-container">
                    <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" class="free-img w-100 p-auto" alt="">
                </div>
                <button class="btn btn-primary btn-sm rounded-pill btn_post post_badge">Free</button>
                @endif
                @if($post->type == 'Subscriber')
                <div class="img-container">
                    <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" class="free-img w-100 subscribe_image p-auto" alt="">
                </div>
                <button class="btn btn-success btn-sm rounded-pill btn_post post_badge">Subscriber</button>
                @endif
                @if($post->type == 'Premium')
                <div class="img-container">
                    <video controls class="model-post-img w-100 p-0 free-img">
                        <source src="{{asset('storage/uploads/' .$post->image_video. '')}}" type="video/mp4">
                    </video>
                </div>
                <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post_badge">Premium</button>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</div>
<script>
    function changecover() {
        document.getElementById('cover_img').click();
    }
    function changeuser() {
        document.getElementById('user_img').click();
    }
    function uploadprofile() {
        document.getElementById('profile').submit()
    }
    function uploadcover() {
        document.getElementById('cover').submit()
    }
</script>
@endsection