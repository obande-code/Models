@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    <div class="card border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('addnewblog') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold mb-0">Image</label>
                    <label for="image_video" class="btn btn-login btn-success btn-block upload_label login_button">
                        {{ __('Upload') }}
                    </label>
                    <!-- <input type="file" onchange="filechoose(event)" enctype=”multipart/form-data”
                        class="form-control upload_input signup_input" id="image_video" placeholder="Upload here"
                        name="image_video" required>
                    <input type="text" class="form-control signup_input mt-2" id="uploadImage" placeholder="Upload here"
                        required name="uploadImage" autofocus> -->
                </div>
                <div class="form-group">
                    <label for="title" class="font-weight-bold mb-0">Title</label>
                    <input type="text" class="form-control signup_input" id="title" placeholder="Type here"
                        required name="title" autofocus>
                </div>
                <div class="form-group">
                    <label for="date" class="font-weight-bold mb-0">Date</label>
                    <input type="text" class="form-control signup_input" id="date" placeholder="Type here"
                        required name="date" autofocus>
                </div>
                <div class="form-group">
                    <label for="body" class="font-weight-bold mb-0">Body</label>
                    <textarea type="text" class="form-control signup_input" id="body" placeholder="Type here"
                        required name="body" autofocus></textarea>
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