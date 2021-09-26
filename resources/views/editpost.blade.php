@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    <div class="card border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('editsavepost') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold mb-0">Image / Video</label>
                    <label for="image_video" class="btn btn-login btn-success btn-block upload_label login_button">
                        {{ __('Upload') }}
                    </label>
                    <input type="file" onchange="filechoose(event)" enctype=”multipart/form-data”
                        class="form-control upload_input signup_input" id="image_video" placeholder="Upload here"
                        name="image_video" required>
                    <input type="text" class="form-control signup_input mt-2" id="uploadImage" placeholder="Upload here"
                        name="uploadImage" value="{{$post[0]->image_video}}" autofocus>
                    <input type="text" class="form-control signup_input" id="id" style="visibility:hidden; height: 0"
                        required name="id" value="{{$post[0]->id}}">
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold mb-0">Description</label>
                    <input type="text" class="form-control signup_input" id="description" placeholder="Type here"
                        required name="description" value="{{$post[0]->description}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="type" class="font-weight-bold mb-0">Type</label>
                    <select class="form-control signup_input" onchange="selectType()" id="type" name="type" required>
                        <option hidden>Select one</option>
                        @if($post[0]->type == 'Free')
                        <option selected>Free</option>
                        <option>Subscriber</option>
                        <option>Premium</option>
                        @endif
                        @if($post[0]->type == 'Subscriber')
                        <option>Free</option>
                        <option selected>Subscriber</option>
                        <option>Premium</option>
                        @endif
                        @if($post[0]->type == 'Premium')
                        <option>Free</option>
                        <option>Subscriber</option>
                        <option selected>Premium</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount" class="font-weight-bold mb-0">Amount</label>
                    <input id="amount" type="text" value="{{$post[0]->amount}}" placeholder="$0.00"
                        class="form-control signup_input" name="amount" required>
                </div>
                <button type="submit" class="btn btn-danger login_button fixed-bottom btn_addpost w-100">Upload</button>
            </form>
        </div>
    </div>
</div>
<script>
function selectType() {
    let type = document.getElementById('type').value;
    if (type === 'Free' || type === 'Subscriber') {
        document.getElementById('amount').value = '$0.00';
        document.getElementById('amount').disabled = true;
    } else
        document.getElementById('amount').disabled = false;
}

function filechoose(event) {
    document.getElementById('uploadImage').value = document.getElementById('image_video').value;
}
</script>
@endsection