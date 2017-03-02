@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit your profile</div>

                <div class="panel-body">
                    <form class="" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label for="avatar">Upload Avatar</label>
                        <input type="file" name="avatar" accept="image/*">
                      </div>
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" value="{{ $info->location }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="jobs">Jobs</label>
                        <input type="text" name="jobs" value="{{ $info->jobs }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="education">Education</label>
                        <input type="text" name="education" value="{{ $info->education }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="about">About Me</label>
                        <textarea name="about" id="about" rows="8" cols="40" class="form-control" required>{{ $info->about }}</textarea>
                      </div>

                      <div class="form-group">
                        <p class="text-center"><button type="submit" name="button" class="btn btn-primary btn-lg">Save your info</button></p>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
