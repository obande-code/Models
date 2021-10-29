@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class=" w-75 d-flex flex-column model_img_mobile">
        <div class="mt-2 d-flex flex-column model_img_mobile position-relative mb-2 box-shadow">
            <!-- Modal -->
            <button type="button" class="btn-modal" data-toggle="modal" data-target="#exampleModal" id="modalbutton">
                Launch demo modal
            </button>
            
            @if($model[0]->cover == NULL)
            <img src="{{ asset('image/download (2).png') }}" class="model-cover" alt="">
            @endif
            @if($model[0]->cover != NULL)
            <img src="{{asset('storage/uploads/' .$model[0]->cover. '')}}" class="model-cover" alt="">
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
            <div class="d-flex justify-content-center mb-2 font-weight-bold">
                <img src="{{ asset('image/download (38).png') }}" class="ml-auto mx-3" style="visibility:hidden" alt="">
                {{$model[0]->name}}
                <img src="{{ asset('Bootstrap-Country-Picker-jQuery/css/flags/'.$model[0]->nationality.'.png') }}" class="ml-auto mx-3 flag-img" alt="">
            </div>
        </div>
        
        <div class="d-flex my-2">
            @if(sizeof($subscriber) > 0)
            <button class="btn rounded-pill btn-outline-danger btn-subscribe mx-1">Subscribe</button>
            @else
            <form method="GET" action="{{ route('stripe') }}">
            @csrf
                <input id="subscriptionfee" class="subscriptionfee" type="text" value="{{$profile[0]->subscriptionfee}}" name="subscriptionfee">
                <input id="model" class="subscriptionfee" type="text" value="{{$model[0]->name}}" name="model">
                <button class="btn rounded-pill btn-outline-danger btn-subscribe mx-1" onclick="subscribe('{{$model[0]->name}}')">Subscribe</button>
            </form>
            @endif
            @if(sizeof($favorite) > 0)
            <img src="{{ asset('image/download (72).png') }}"  onclick="removefavorite('{{$model[0]->name}}')" class="mx-2 heart-img" alt="">
            @endif
            @if(sizeof($favorite) == 0)
            <img src="{{ asset('image/download (71).png') }}"  onclick="addfavorite('{{$model[0]->name}}')" class="mx-2 heart-img" alt="">
            @endif
            <a class="mx-1" href="{{ url('models/' . $model[0]->name.'/chat') }}">
                <!-- <img src="{{ asset('image/download (37).png') }}" class="chat-img" alt=""> -->
            </a>
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
                @if(sizeof($subscriber) > 0)
                <div class="img-container">
                    <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" class="free-img w-100 p-auto" alt="">
                </div>
                <button class="btn btn-success btn-sm rounded-pill btn_post post_badge">Subscriber</button>
                @else
                <div class="img-container">
                    <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" class="free-img w-100 subscribe_image p-auto" alt="">
                </div>
                <button class="btn btn-success btn-sm rounded-pill btn_post post_badge">Subscriber</button>
                @endif
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="d-flex justify-content-center">{{$model[0]->name}}</div>
                <div class="d-flex justify-content-center">{{$model[0]->nationality}}</div>
                <div class="d-flex justify-content-center">24 y/o</div>
                <div class="d-flex justify-content-center">{{$profile[0]->description}}</div>
                <div class="d-flex justify-content-center">{{$profile[0]->facebook}}</div>
                <div class="d-flex justify-content-center">{{$profile[0]->instagram}}</div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-success w-25" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    function infoshow() {
        document.getElementById('modalbutton').click();
    }
    function addfavorite(value) {
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("/add-favorite", {
                modelname: value
            }, function(result) {
                location.reload();
            });
        });
    }
    function removefavorite(value) {
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("/remove-favorite", {
                modelname: value
            }, function(result) {
                location.reload();
            });
        });
    }
</script>
@endsection