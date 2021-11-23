@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-column flex-wrap">
    <div class="card border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('editsavefaq') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="question" class="font-weight-bold mb-0">Question</label>
                    <textarea type="text" class="form-control signup_input" id="question" placeholder="Type here"
                        required name="question" value="{{$post[0]->question}}" autofocus></textarea>
                    <input type="text" class="form-control signup_input" id="id" style="visibility:hidden; height: 0"
                        required name="id" value="{{$post[0]->id}}">
                </div>
                <div class="form-group">
                    <label for="answer" class="font-weight-bold mb-0">Answer</label>
                    <textarea type="text" class="form-control signup_input" id="answer" placeholder="Type here"
                        required name="answer" value="{{$post[0]->answer}}" autofocus></textarea>
                </div>
                <!-- <button type="submit" class="btn btn-danger login_button fixed-bottom btn_addpost w-100">Upload</button> -->
            </form>
        </div>
    </div>
</div>
@endsection