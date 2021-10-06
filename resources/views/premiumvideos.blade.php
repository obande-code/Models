@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
  <div class="mt-3 w-75">
    <form method="POST" action="{{ route('premiumvideosearch') }}" class="model_img_mobile justify-content-around d-flex">
    @csrf
      <input type="text" required class="form-control search_input" name="search" id="exampleFormControlInput1" placeholder="Search for Model">
      <button type="submit" class="btn btn-outline-dark fiter_button ml-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
          <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </button>
    </form>
  </div>
  <div class=" w-75 d-flex model_img_mobile mt-3 row">
    <div class="col-12">Paid</div>
    @foreach ($premium as $post)
    @foreach ($paids as $paid)
    @if($paid->premiumvideo == $post->image_video)
    <div class="col-lg-4 col-6 p-0 text-center img-block p-1">
      <div class="premium-video-container">
        <video onclick="videoclick(event)" class="model-post-video w-100 p-0 videos" id="{{$post->image_video}}">
            <source src="{{asset('storage/uploads/' .$post->image_video. '')}}" type="video/mp4">
        </video>
        <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post-tag">Premium</button>
        <p class="post-amount text-light">{{$post->amount}}</p>
        <p class="post-description text-light">{{$post->description}}</p>
        <p class="post-username text-light">{{$post->username}}</p>
        <div class="post-duration text-light times">
          <span class="duration-span" id="{{$post->image_video . 'time'}}"></span>
        </div>
      </div>
      <div class="post-user-image" id="{{$post->image_video . 'img'}}">
        @foreach($models as $model)
          @if($model->name == $post->username)
          <img src="{{asset('storage/uploads/' .$model->profile. '')}}" alt="" class="w-100">
          @endif
        @endforeach
      </div>
    </div>
    @endif
    @endforeach
    @endforeach
  </div>
  <div class=" w-75 d-flex model_img_mobile mt-3 row">
    <div class="col-12">Others</div>
    @foreach ($premium as $post)
    @if(sizeof($paids) > 0)
    @if(array_search($post->image_video, array_column($paids, 'premiumvideo')))
    <div></div>
    @elseif($post->image_video == $paids[0]->premiumvideo)
    <div></div>
    @else
    <div class="col-lg-4 col-6 p-0 text-center img-block p-1">
      <div class="premium-video-container">
        <video onclick="videoclick(event)" class="model-post-video w-100 p-0 videos" id="{{$post->image_video}}" style="filter: blur(10px)">
            <source src="{{asset('storage/uploads/' .$post->image_video. '')}}" type="video/mp4">
        </video>
        <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post-tag">Premium</button>
        <p class="post-amount text-light">{{$post->amount}}</p>
        <p class="post-description text-light">{{$post->description}}</p>
        <p class="post-username text-light">{{$post->username}}</p>
        <div class="post-duration text-light times">
          <span class="duration-span" id="{{$post->image_video . 'time'}}"></span>
        </div>
      </div>
      <div class="post-user-image" id="{{$post->image_video . 'img'}}">
        @foreach($models as $model)
          @if($model->name == $post->username)
          <img src="{{asset('storage/uploads/' .$model->profile. '')}}" alt="" class="w-100">
          @endif
        @endforeach
      </div>
    </div>
    @endif
    @else
    <div class="col-lg-4 col-6 p-0 text-center img-block p-1">
      <div class="premium-video-container">
        <video onclick="videoclick(event)" class="model-post-video w-100 p-0 videos" id="{{$post->image_video}}" style="filter: blur(10px)">
            <source src="{{asset('storage/uploads/' .$post->image_video. '')}}" type="video/mp4">
        </video>
        <button class="btn btn-warning btn-sm text-light rounded-pill btn_post post-tag">Premium</button>
        <p class="post-amount text-light">{{$post->amount}}</p>
        <p class="post-description text-light">{{$post->description}}</p>
        <p class="post-username text-light">{{$post->username}}</p>
        <div class="post-duration text-light times">
          <span class="duration-span" id="{{$post->image_video . 'time'}}"></span>
        </div>
      </div>
      <div class="post-user-image" id="{{$post->image_video . 'img'}}">
        @foreach($models as $model)
          @if($model->name == $post->username)
          <img src="{{asset('storage/uploads/' .$model->profile. '')}}" alt="" class="w-100">
          @endif
        @endforeach
      </div>
    </div>
    @endif
    @endforeach
  </div>
  
  <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body d-flex justify-content-center">
                  <h6>ARE YOU SURE YOU WANT TO PAY?</h6>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-danger rounded-pill btn-sm w-25"
                      data-dismiss="modal">No</button>
                  <button type="button" data-dismiss="modal" onclick="payclick()" class="btn btn-success rounded-pill btn-sm w-25">Yes</button>
              </div>
          </div>
      </div>
  </div>
  <button id="btn-modal" style="height: 0;" class="m-0 p-0 border-0" data-toggle="modal" data-target="#confirmDelete">
  </button>
</div>
<script>
document.onreadystatechange = function () {
  if (document.readyState === 'complete') {
    
  }
}
function payclick(event) {
  let selectvideo = localStorage.getItem("selectvideo");
  $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      $.post("/paid", {
          premiumvideo: selectvideo
      }, function(result) {
          window.location.href = '/premiumvideos';
      });
  });
}
function videoclick(event) {
  let blur = event.currentTarget.style.filter;
  if (blur != 'blur(10px)') {
    if (event.currentTarget.playing) {
      event.currentTarget.pause();
    }
    else {
      event.currentTarget.play();
    }
    event.currentTarget.style.zIndex = 1;
  }
  else {
    document.getElementById('btn-modal').click();
    localStorage.setItem("selectvideo", event.currentTarget.id);
  }
}
</script>
@endsection
