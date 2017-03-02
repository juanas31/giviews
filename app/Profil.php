<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['location', 'about', 'jobs', 'education', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
