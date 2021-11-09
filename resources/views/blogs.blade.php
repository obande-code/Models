@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class="d-flex flex-column">
        @foreach($blogs as $blog)
        @if($loop->index%2 == 0)
        <div class="p-2 d-flex flex-column border rounded blog-block">
          <img src="{{asset('storage/uploads/' .$blog->image. '')}}" class="blog-image" alt="">
          <h4>{{$blog->title}}</h4>
          <h6>{{$blog->date}}</h6>
          <p class="blog-body">{{$blog->body}}</p>
        </div>
        @endif
        @endforeach
    </div>
    <div class="d-flex flex-column">
        @foreach($blogs as $blog)
        @if($loop->index%2 == 1)
        <!-- <div class="p-2 d-flex flex-column border rounded blog-block"> -->
          <img src="{{asset('storage/uploads/' .$blog->image. '')}}" class="blog-image" alt="">
          <h4>{{$blog->title}}</h4>
          <h6>{{$blog->date}}</h6>
          <p class="blog-body">{{$blog->body}}</p>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
