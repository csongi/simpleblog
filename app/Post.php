<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

    protected $table = 'posts';

    protected $fillable =  ['title', 'content', 'user_id', 'created_at', 'updated_at'];
    protected $guarded  = ['id'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
