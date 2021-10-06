@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
  <div class=" w-75 d-flex flex-column model_img_mobile mt-4 p-3">
    @foreach($faqs as $faq)
    <div class="mb-0">
      <div class="d-flex">
        <div class="d-flex justify-content-end">
          <pre class="font-weight-bold faqs-text">Q: </pre>
        </div>
        <div class="d-flex">
          <p class="font-weight-bold faqs-text mb-0">{{$faq->question}}</p>
        </div>
      </div>
      <div class="d-flex">
        <div class="d-flex justify-content-end">
          <pre class="faqs-text">A: </pre>
        </div>
        <div class="d-flex">
          <p class="faqs-text">{{$faq->answer}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
