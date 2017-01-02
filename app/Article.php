<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [

       'title',
       'body',
       'location',
       'contact',
       'gender',
       'year',

    ];

	public function user()
	{

		return $this->belongsTo(User::class);

	}

    public function photo()
  {

    return $this->hasMany(Photo::class);

  }


}
