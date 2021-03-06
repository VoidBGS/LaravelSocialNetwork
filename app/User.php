<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'last_logged_in'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
            return $this->hasOne(Profile::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }
    public function posts()
    {
        return $this->hasMany(ForumPost::Class);
    }
    public function memes()
    {
        return $this->hasMany(Meme::Class);
    }
    public function getAvatarAttribute(){
        return $this->profile->avatar;
    }
    protected static function boot(){
        parent::boot();

        static::created(function ($user){
               $user->profile()->create([
                   "description"=> $user->name,
               ]);
        });
    }
}
