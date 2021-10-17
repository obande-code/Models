@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    <div class="card border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('editsavebanner') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold mb-0">Image / Video</label>
                    <label for="image_video" class="btn btn-login btn-success btn-block upload_label login_button">
                        {{ __('Upload') }}
                    </label>
                    <!-- <input type="file" onchange="filechoose(event)" enctype=”multipart/form-data”
                        class="form-control upload_input signup_input" id="image_video" placeholder="Upload here"
                        name="image_video">
                    <input type="text" class="form-control signup_input mt-2" id="uploadImage" placeholder="Upload here"
                        name="uploadImage" value="{{$post[0]->path}}" autofocus>
                    <input type="text" class="form-control signup_input" id="id" style="visibility:hidden; height: 0"
                        required name="id" value="{{$post[0]->id}}"> -->
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold mb-0">Description</label>
                    <input type="text" class="form-control signup_input" id="description" placeholder="Type here"
                        required name="description" value="{{$post[0]->description}}" autofocus>
                </div>
                <button type="submit" class="btn btn-danger login_button fixed-bottom btn_addpost w-100">Upload</button>
            </form>
        </div>
    </div>
</div>
<script>
function filechoose(event) {
    document.getElementById('uploadImage').value = document.getElementById('image_video').value;
}
</script>
@endsection