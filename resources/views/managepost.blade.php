@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    @foreach ($posts as $post)
    <div class="position-relative">
        <div class="d-flex justify-content-between mt-3 pb-2 post_item"
            onclick="editshowClick({{substr($post->image_video, 0, 10)}})">
            <div class="d-flex flex-column justify-content-center">
                <img src="{{asset('storage/uploads/' .$post->image_video. '')}}" alt="" class="mx-3 post_img">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <p class="mx-3 mb-0">
                    {{$post->description}}
                </p>
            </div>
            <div class="d-flex flex-column justify-content-center mx-3">
                @if($post->type == 'Free')
                <button class="btn btn-primary btn-sm rounded-pill btn_post">Free</button>
                @endif
                @if($post->type == 'Subscriber')
                <button class="btn btn-success btn-sm rounded-pill btn_post">Subscriber</button>
                @endif
                @if($post->type == 'Premium')
                <button class="btn btn-sm btn-warning text-light rounded-pill btn_post">Premium</button>
                @endif
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body d-flex justify-content-center">
                        <h6>Are you sure you want to delete?</h6>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger rounded-pill btn-sm w-25"
                            data-dismiss="modal">No</button>
                        <a href="{{ url('delpost/' . $post->image_video) }}" type="button"
                            class="btn btn-success rounded-pill btn-sm w-25">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="{{substr($post->image_video, 0, 10)}}" onclick="editremove({{substr($post->image_video, 0, 10)}})"
            class="d-flex justify-content-around mt-3 pb-2 position-absolute w-100 edit_del_block">
            <div class="mt-4">
                <button class="btn btn-danger rounded-circle p-2 mx-2" data-toggle="modal" data-target="#confirmDelete">
                    <img src="{{ asset('image/download (79).png') }}" class="btn_delpost" alt="">
                </button>
                <a href="{{ url('editpost/' . $post->image_video) }}" class="btn btn-primary rounded-circle p-2 mx-2">
                    <img src="{{ asset('image/download (80).png') }}" class="btn_editpost" alt="">
                </a>
            </div>
        </div>
    </div>
    @endforeach
    <a class="btn btn-danger login_button fixed-bottom btn_addpost w-100" href="/newpost">Add New</a>
</div>
<script>
function editshowClick(id) {
    document.getElementById(id).style.zIndex = 1;
}

function editremove(id) {
    document.getElementById(id).style.zIndex = -1;
}
</script>
@endsection