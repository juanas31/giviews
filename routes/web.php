<?php
use App\events\MessagePosted;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/career', function () {
    return view('career');
});
Route::get('/dev', function () {
    return view('dev');
});
Route::get('/adds', function () {
    return view('add');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/download', function () {
    return view('download');
});
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

Route::get('/messages', function () {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function () {
  // Store the new message
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => request()->get('message')
  ]);

  // Announce the new message has been posted
  broadcast(new MessagePosted($message, $user))->toOthers();

  return ['status' => 'OK'];
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::group(['middleware' => ['web']], function() {
//   Route::resource('nots','ProfilesController');
// });

Route::group(['middleware' => 'auth'], function(){
  Route::get('/profile/{slug}', [
    'uses' => 'ProfilesController@index',
    'as' => 'profile'
  ]);

  // Route::get('/{slug}', [
  //   'uses' => 'ProfilesController@index',
  //   'as' => 'profile'
  // ]);

  Route::get('/profile/edit/profile', [
    'uses' => 'ProfilesController@edit',
    'as' => 'profile.edit'
  ]);

  Route::post('/profile/update/profile', [
    'uses' => 'ProfilesController@update',
    'as' => 'profile.update'
  ]);

  Route::get('/check_relationship_status/{id}', [
      'uses' => 'FriendshipsController@check',
      'as' => 'check'
  ]);

  Route::get('/add_friend/{id}', [
      'uses' => 'FriendshipsController@add_friend',
      'as' => 'add_friend'
  ]);

  Route::get('/accept_friend/{id}', [
      'uses' => 'FriendshipsController@accept_friend',
      'as' => 'accept_friend'
  ]);

  Route::get('/get_unread', function(){
    return Auth::user()->unreadNotifications;
  });

  Route::get('/notifications', [
      'uses' => 'ProfilesController@notifications',
      'as' => 'Notifications'
  ]);

  Route::get('/feed', [
      'uses' => 'FeedsController@feed',
      'as' => 'feed'
  ]);

  Route::post('/create_post', [
    'uses' => 'PostsController@store'
  ]);

  Route::get('/get_auth_user_data', function() {
    return Auth::user();
  });

  Route::get('/like/{id}', [
    'uses' => 'LikesController@like'
  ]);

  Route::get('/unlike/{id}', [
    'uses' => 'LikesController@unlike'
  ]);
});
