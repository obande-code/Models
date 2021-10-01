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
  @foreach ($premium as $post)
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
    <div class="post-user-image" onclick="payclick(event)" id="{{$post->image_video . 'img'}}">
      <img src="{{asset('image/cat7.jpg')}}" alt="" class="">
    </div>
  </div>
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
    let videos = document.getElementsByTagName('video');
    for (let index = 0; index < videos.length; index++) {
      const element = videos[index];
      if (element.duration) {
        let m1 = parseInt(element.duration/600);
        let m2 = parseInt(element.duration/60);
        let s1 = parseInt(element.duration%60/10);
        let s2 = parseInt(element.duration%60%10);
        document.getElementById(element.id+'time').innerHTML  = m1.toString()+m2.toString()+':'+s1.toString()+s2.toString();
      }
      else {
        let m1 = Math.floor(Math.random() * 5);
        let m2 = Math.floor(Math.random() * 10);
        let s1 = Math.floor(Math.random() * 5);
        let s2 = Math.floor(Math.random() * 10);document.getElementById(element.id+'time').innerHTML  = m1.toString()+m2.toString()+':'+s1.toString()+s2.toString();
      }
    }
  }
}
function payclick(event) {
  let selectvideo = localStorage.getItem("selectvideo");
  document.getElementById(selectvideo).style.filter = 'blur(0px)';
}
function videoclick(event) {
  console.log(event.currentTarget.style.filter)
  let blur = event.currentTarget.style.filter;
  if (blur != 'blur(10px)') {
    event.currentTarget.controls = true;
    event.currentTarget.style.zIndex = 1;
  }
  else {
    document.getElementById('btn-modal').click();
    localStorage.setItem("selectvideo", event.currentTarget.id);
  }
}
</script>
@endsection
