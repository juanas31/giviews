@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Notifications</div>

                <div class="panel-body">
                    <ul class="list-group">
                      @foreach($nots as $not)
                        <li class="list-group-item">
                          <a href="{{ route('profile', ['slug' => $not->data['slug'] ]) }}">
                            <img src="{{ $not->data['avatar'] }}" alt="user-profile" style="max-width:20px;max-height:20px">
                            {{ $not->data['name'] }} &nbsp; {{ $not->data['message'] }}
                            <span class="pull-right badge">{{ $not->created_at->diffForHumans() }}</span>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
