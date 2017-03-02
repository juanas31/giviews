<?php

Broadcast::channel('App.User.{id}', function ($user, $id) {
  return (int) $user->id === (int) $id;
});

Broadcast::channel('chatroom', function ($user) {
  return $user;
});
