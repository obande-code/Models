@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    <div class="card border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('addnewfaq') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="question" class="font-weight-bold mb-0">Question</label>
                    <input type="text" class="form-control signup_input" id="question" placeholder="Type here"
                        required name="question" autofocus>
                </div>
                <div class="form-group">
                    <label for="answer" class="font-weight-bold mb-0">Answer</label>
                    <input type="text" class="form-control signup_input" id="answer" placeholder="Type here"
                        required name="answer" autofocus>
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