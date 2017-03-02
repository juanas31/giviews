@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <p class="text-center">
          {{ $user->name }}'s Profile.
        </p>
      </div>
      <div class="panel-body">
        <center>
          <img src="{{ $user->avatar }}" width="140px" height="140px" style="border-radius: 50%;" alt="">
        </center>
        <br>
        <p class="text-center">
          {{ $user->profile->jobs }}
        </p>
      </div>
      <div class="panel-footer pull-right">
        <p class="text-center">
        @if(Auth::id() == $user->id)
        <a href="{{ route('profile.edit') }}" class="btn btn-info">Edit your Profile</a>
        @endif
        @if(Auth::id() !== $user->id)
            <friend :profile_user_id="{{ $user->id }}"></friend>
        @endif
      </p>
      </div>
    </div>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Timeline</a></li>
          <li><a data-toggle="tab" href="#menu1">Info</a></li>
          <li><a data-toggle="tab" href="#menu2">Friends</a></li>
          <li></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">

        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="panel panel-default">
              <div class="panel-heading">
                <p class="text-center">
                About Me
                </p>
              </div>
              <div class="panel-body">
                <p class="text-center">
                  <h5>Education</h5>
                  {{ $user->profile->education }}
                  <hr>
                  <h5>Location</h5>
                  {{ $user->profile->location }}
                  <hr>
                  <h5>Notes</h5>
                  {{ $user->profile->about }}
                </p>
              </div>
            </div>
          </div>
          <div id="menu2" class="tab-pane fade">
            Semua Teman
        </div>
      </div>
    </div>
  </div>
@endsection
