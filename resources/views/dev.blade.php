@extends('layouts.app')
@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{ Storage::url('public/img/untitled-22.jpg') }}" alt="...">
      <div class="carousel-caption">
        <h2>Welcome to developer page</h2>
        <p>Contribute to giviews</p>
      </div>
    </div>
    <div class="item">
      <img src="{{ Storage::url('public/img/untitled-23p.jpg') }}" alt="...">
      <div class="carousel-caption">
        <h2>Giviews RESTfulAPI</h2>
        <p>Learn our API's</p>
      </div>
    </div>
    <div class="item">
      <img src="{{ Storage::url('public/img/untitled-24s.jpg') }}" alt="...">
      <div class="carousel-caption">
        <h2>Giviews Developer Summit</h2>
        <p>Join giviews developer conference</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
