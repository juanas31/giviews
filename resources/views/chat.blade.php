@extends('layouts.app')

@section('content')
<div id="app">
  <div class="container">
    <div class="col-md-8">
      <div class="panel panel-default">
      <div class="panel-heading">
        Chat Room
        <span class="badge pull-right">@{{ usersInRoom.length }}</span>
      </div>
      <div class="panel-body">
      <chat-log :messages="messages"></chat-log>
      <chat-composer v-on:messagesent="addMessage"></chat-composer>
    </div>
    </div>
  </div>
</div>
</div>
@endsection
