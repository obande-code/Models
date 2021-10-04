@extends('layouts.dashboard')
@section('style')
@endsection
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div id="carouselExampleInterval" class="carousel slide w-75 maincontent_img" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $banner)
            @if($banner == $banners[0])
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @else
            <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"></li>
            @endif
            @endforeach
        </ol>    
        <div class="carousel-inner">
            
            @foreach($banners as $banner)
            @if($banner == $banners[0])
            <div class="carousel-item active" data-interval="3000">
                <img src="{{asset('storage/uploads/' .$banner->path. '')}}" class="d-block carousel-img w-100" alt="...">
            </div>
            @else
            <div class="carousel-item" data-interval="3000">
                <img src="{{asset('storage/uploads/' .$banner->path. '')}}" class="d-block carousel-img w-100" alt="...">
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="w-75 d-flex mt-3 justify-content-around models_round_img_container">
        @foreach($models as $model)
        <div class="mx-3 w-25">
            <div class="round-img-container">
                @if($model->profile != NULL)
                <img src="{{asset('storage/uploads/' .$model->profile. '')}}" class="round-img" alt="">
                @endif
                @if($model->profile == NULL)
                <img src="{{ asset('image/download (10).png') }}" class="round-img" alt="">
                @endif
            </div>
            <div class="d-flex justify-content-center">
            {{$model->name}}
            </div>
        </div>
        @endforeach
    </div>
    @foreach($advertisements as $advertisement)
    <div class="advertise">
        <p class="advertise-title">{{$advertisement->description}}</p>
        <img src="{{asset('storage/uploads/' .$advertisement->path. '')}}" class="w-100 px-1 maincontent_img" alt="">
    </div>
    @endforeach
</div>
@endsection
@section('script')
@endsection
