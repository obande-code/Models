@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
  <div class="mt-3 w-75">
    <form method="POST" action="{{ route('exploresearch') }}" class="model_img_mobile justify-content-around d-flex">
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
    @foreach ($freeposts as $post)
    <div class="col-lg-3 col-6 text-center img-block p-1">
      <div>
        <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" alt="" class="w-100 free-img">
      </div>
      <a href="{{ url('models/' . $post->username) }}"><h6 class="post-name text-light">{{$post->username}}</h6></a> 
    </div>
    @endforeach
  </div>
  <div class="paginate-block">
  {!! $freeposts->links() !!}
  </div>
</div>
@endsection
