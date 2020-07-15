<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'meme_id', 'posted_by', 'posted_on', 'forum_post_id'
    ];
   public function post()
   {
       return $this->belongsTo(ForumPost::class);
   }
   public function meme(){
       return $this->belongsTo(Meme::class);
   }
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
