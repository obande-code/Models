@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class=" w-75 d-flex flex-column model_img_mobile">
        <div class="mt-2 d-flex flex-column model_img_mobile position-relative">
            <!-- Modal -->
            <button type="button" class="btn-modal" data-toggle="modal" data-target="#exampleModal" id="modalbutton">
                Launch demo modal
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-center">Miyuki Kurigawa</div>
                            <div class="d-flex justify-content-center">Japanese</div>
                            <div class="d-flex justify-content-center">24 y/o</div>
                            <div class="d-flex justify-content-center">Fitness Coach | Model | Actress</div>
                            <div class="d-flex justify-content-center">https://www.facebook.com/miyukikuragawi/</div>
                            <div class="d-flex justify-content-center">https://www.instagram.com/miyukikuragawi/</div>
                            <div class="d-flex justify-content-center mt-4">
                                <button class="btn btn-success w-25" data-dismiss="modal">ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($model[0]->cover == NULL)
            <img src="{{ asset('image/download(2).jpg') }}" class="mt-1 model-cover" alt="">
            @endif
            @if($model[0]->cover != NULL)
            <img src="{{asset('storage/uploads/' .$model[0]->cover. '')}}" class="mt-1 model-cover" alt="">
            @endif
            <img src="{{ asset('image/download (74).png') }}" class="model_info_image" onmouseover="infoshow()" alt="">
            <a href="/models">
                <div class="image_middle">
                    @if($model[0]->profile == NULL)
                    <img src="{{ asset('image/cat5.jpg') }}" class="w-100 user-image" alt="">
                    @endif
                    @if($model[0]->profile != NULL)
                    <img src="{{asset('storage/uploads/' .$model[0]->profile. '')}}" class="w-100 user-image" alt="">
                    @endif
                </div>
            </a>
            <div class="d-flex justify-content-center">{{$model[0]->name}}</div>
        </div>
        
        <div class="d-flex mt-1">
            <button class="btn rounded-pill btn-outline-danger btn-sm btn-subscribe mx-1" onclick="subscribe()">Subscribe</button>
            <img src="{{ asset('image/download (71).png') }}" onclick="favorite('{{$model[0]->name}}')" class="mx-2 heart-img" alt="">
            <a class="mx-1" href="{{ url('models/' . $model[0]->name.'/chat') }}">
                <img src="{{ asset('image/download (37).png') }}" class="chat-img" alt="">
            </a>
            <img src="{{ asset('image/download (38).png') }}" class="ml-auto mx-1" alt="">
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
                <video controls class="model-post-img w-100 p-0 premium_image">
                    <source src="{{asset('storage/uploads/' .$post->image_video. '')}}" type="video/mp4">
                </video>
                <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post_badge">Premium</button>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</div>
<script>
    function subscribe() {
        let subscribes = document.getElementsByClassName('subscribe_image');
        for (let index = 0; index < subscribes.length; index++) {
            subscribes[index].style.filter = 'blur(0)';
        }
    }
    function infoshow() {
        document.getElementById('modalbutton').click();
    }
    function favorite(value) {
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("/add-favorite", {
                modelname: value
            }, function(result) {
                console.log(result);
            });
        });
    }
</script>
@endsection