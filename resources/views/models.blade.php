@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
    <div class="mt-3 w-75 d-flex model_img_mobile justify-content-between">
        <input type="email" class="form-control search_input" id="exampleFormControlInput1"
            placeholder="Search for Model">
        <button class="btn btn-outline-dark fiter_button ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left"
                viewBox="0 0 16 16">
                <path
                    d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
    </div>
    <div class="w-75">
        <div class="row">
            @foreach ($models as $model)
            <div class="col-6 mt-2 d-flex flex-column model_img_mobile box-shadow">
                @if($model->cover == NULL)
                <img src="{{ asset('image/download (26).png') }}" class="mt-2 cover-img" alt="">
                @endif
                @if($model->cover != NULL)
                <img src="{{asset('storage/uploads/' .$model->cover. '')}}" class="mt-2 cover-img" alt="">
                @endif
                <a href="{{ url('models/' . $model->name) }}">
                    <div class="image_middle">
                        @if($model->profile == NULL)
                        <img src="{{ asset('image/download (27).png') }}" class="w-100 user-image" alt="">
                        @endif
                        @if($model->profile != NULL)
                        <img src="{{asset('storage/uploads/' .$model->profile. '')}}" class="w-100 user-image" alt="">
                        @endif
                    </div>
                </a>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('image/download (38).png') }}" class="ml-auto mx-1" style="visibility:hidden" alt="">
                    {{$model->name}}
                    <img src="{{ asset('image/download (38).png') }}" class="ml-auto mx-1" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection