@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <p class="text-center">
          <a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">
          {{ Auth::user()->name }}'s Profile.
        </p>
      </div>
      <div class="panel-body">
        <center>
          <img src="{{ Auth::user()->avatar }}" width="140px" height="140px" style="border-radius: 50%;" alt="">
        </a>
        </center>
        <br>
        <p class="text-center">
          {{ Auth::user()->profile->jobs }}
        </p>
        <p class="text-center">
          @if(Auth::id() == Auth::user()->id)
          <a href="{{ route('profile.edit') }}" class="btn btn-info">Edit your Profile</a>
          @endif
        </p>
      </div>
    </div>
    @if(Auth::id() !== Auth::user()->id)
    <div class="panel panel-default">
      <div class="body">
        <friend :profile_user_id="{{ Auth::user()->id }}"></friend>
      </div>
    </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">
        <p class="text-center">
        About Me
        </p>
      </div>
      <div class="panel-body">
        <p class="text-center">
          <h5>Education</h5>
          {{ Auth::user()->profile->education }}
          <hr>
          <h5>Location</h5>
          {{ Auth::user()->profile->location }}
          <hr>
          <h5>Notes</h5>
          {{ Auth::user()->profile->about }}
        </p>
      </div>
    </div>
  </div>
<div class="col-md-6">
    <post></post>

    <feed></feed>
</div>

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        Group
      </div>
      <div class="panel-body">
        <ul>
          <li><a href="#">First group</a></li>
          <li><a href="#">Second group</a></li>
          <li><a href="#">Other group</a></li>
        </ul>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Page
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Sponsor
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Friends are Online
      </div>
      <div class="panel-body">

      </div>
      <div class="panel-footer">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Send!</button>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
