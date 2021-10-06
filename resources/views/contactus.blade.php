@extends('layouts.dashboard')
@section('mainContent')
<div class="d-flex justify-content-center flex-wrap">
  <div class="w-50 d-flex flex-column model_img_mobile mt-5 p-2">
      <h5 class="m-auto">ASK US HOW CAN WE HELP YOU</h5>
      <p class="mt-4">
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum?
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      <br>
      <br>
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum?
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      <br>
      <br>
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum?
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.Lorem Ipsum.
      <br>
      <br>
      </p>
      <form class="border border-dark rounded p-4">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
          <div class="col-sm-10">
            <textarea name="message"  class="form-control" style="width:100%; height:60px;"></textarea>
          </div>
        </div>
        <div class="form-group row mb-0">
          <div class="col-sm-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
      <div class="d-flex justify-content-center">
        <div class="mail-img d-flex justify-content-end">
          <img src="{{ asset('image/download (63).png') }}" class="phone-img" alt="">
        </div>
        <div class="mail-title d-flex flex-column  justify-content-center">
          <p class="mb-0">+63 927 305 9127</p>
          <p class="mb-0">+632 8551 71230</p>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="mail-img mail-block d-flex justify-content-end">
          <img src="{{ asset('image/download (64).png') }}" class="m-3" alt="">
        </div>
        <div class="mail-title d-flex flex-column  justify-content-center">
          <p class="mb-0">ohaiiimarketing@gmail.com</p>
          <p class="mb-0">ohaiiirecruitment@gmail.com</p>
          <p class="mb-0">ohaiiidevelopment@gmail.com</p>
          <p class="mb-0">ohaiiihelpdesk@gmail.com</p>
        </div>
      </div>
  </div>
</div>
@endsection
