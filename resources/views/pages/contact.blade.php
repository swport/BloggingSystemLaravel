@extends('main')

@section('title','Contact')

@section('content')

<head>

  <div class="row">
    <div class="col-md-12">
      <h1>Contact Me</h1>
      <hr>
      <form action="{{ url('contact') }}" method="POST">
      {{ csrf_field() }}
       <div class="form-group">
          <label name="name">Full Name:</lablel>
          <input id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
          <label name="email">Email:</lablel>
          <input id="email" name="email" class="form-control">
        </div>

        <div class="form-group">
          <label name="subject">Subject:</lablel>
          <input id="subject" name="subject" class="form-control">
        </div>

        <div class="form-group">
          <label name="message">Message:</lablel>
          <textarea id="message" name="message" class="form-control">Type you message...</textarea>
        </div>
        <input type="submit" value="Send Message" class="btn btn-success">
      </form>
    </div>
  </div>
@endsection

@section('contact-phone')
 <p class="text-center">You can also contact me on my number: 8097 xxx xxx</p>
@endsection
