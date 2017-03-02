<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Friendable;
use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'gender', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
      return $this->hasOne('App\Profil');
    }

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    public function getAvatarAttribute($avatar)
    {
      return asset(Storage::url($avatar));
    }
}
