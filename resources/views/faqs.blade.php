@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
  <div class=" w-50 d-flex flex-column model_img_mobile mt-4 p-3">
    @foreach($faqs as $faq)
    <div class="mb-3">
      <p class="mb-0">Q: {{$faq->question}}</p>
      <p class="mb-0">A: {{$faq->answer}}</p>
    </div>
    @endforeach
  </div>
</div>
@endsection
