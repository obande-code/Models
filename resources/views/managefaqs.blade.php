@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    @foreach ($faqs as $post)
    <div class="position-relative">
        <div class="d-flex flex-column mt-4 pb-2 post_item" onclick="editshowClick({{$post->id}})">
            <p class="ml-4">Q: {{$post->question}}</p>
            <p class="ml-4">A: {{$post->answer}}</p>
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
                        <a href="{{ url('delfaq/' . $post->question) }}" type="button"
                            class="btn btn-success rounded-pill btn-sm w-25">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="{{$post->id}}" onclick="editremove({{$post->id}})"
            class="d-flex justify-content-around mt-3 pb-2 position-absolute w-100 edit_del_block">
            <div class="mt-4">
                <button class="btn btn-danger rounded-circle p-2 mx-2" data-toggle="modal" data-target="#confirmDelete">
                    <img src="{{ asset('image/download (79).png') }}" class="btn_delpost" alt="">
                </button>
                <a href="{{ url('editfaq/' . $post->question) }}" class="btn btn-primary rounded-circle p-2 mx-2">
                    <img src="{{ asset('image/download (80).png') }}" class="btn_editpost" alt="">
                </a>
            </div>
        </div>
    </div>
    @endforeach
    <a class="btn btn-danger login_button fixed-bottom btn_addpost w-100" href="/newfaq">Add New</a>
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