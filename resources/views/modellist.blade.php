@extends('layouts.dashboard')
@section('mainContent')
<div class="overflow-auto">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Name</th>
                <th scope="col">Eamil</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Nationality</th>
                <th scope="col">R Code</th>
                <th scope="col">Accept</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td>{{$model->firstname}}</td>
                <td>{{$model->lastname}}</td>
                <td>{{$model->name}}</td>
                <td>{{$model->email}}</td>
                <td>{{$model->birthdate}}</td>
                <td>{{$model->nationality}}</td>
                <td>{{$model->referralcode}}</td>
                @if($model->isaccept == false)
                <td><button id="{{$model->id}}" onclick="accept_reject({{$model->id}})"
                        class="btn btn-success btn-sm">Accept</button></td>
                @endif
                @if($model->isaccept == true)
                <td><button id="{{$model->id}}" onclick="accept_reject({{$model->id}})"
                        class="btn btn-danger btn-sm">Reject</button></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
function accept_reject(id) {
    if ($("#" + id).text() == 'Accept') {
        model_accept(id);
    } else {
        model_reject(id);
    }
}

function model_accept(id) {
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log(id);
        $.post("/modelaccept", {
            accept: id
        }, function(result) {
            $("#" + id).removeClass("btn-success");
            $("#" + id).addClass("btn-danger");
            $("#" + id).text("Reject");
        });

    });
}

function model_reject(id) {
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log(id);
        $.post("/modelreject", {
            accept: id
        }, function(result) {
            $("#" + id).removeClass("btn-danger");
            $("#" + id).addClass("btn-success");
            $("#" + id).text("Accept");
        });

    });
}
</script>
@endsection