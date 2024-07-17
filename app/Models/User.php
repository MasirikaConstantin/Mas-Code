<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function imageUrls(){
        return Storage::disk('public')->url($this->image); 
    }
    public function commentaire(){
        return $this->belongsToMany(Commentaire::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function com()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function reactions()
{
    return $this->hasMany(Reaction::class);
}

    public function reactionscomm()
    {
        return $this->hasMany(ReactionComme::class);
    }

    ######################################

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'follows_id')->withTimestamps();
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'follows_id', 'user_id')->withTimestamps();
    }

    public function subscribeTo(User $user)
    {
        return $this->subscriptions()->attach($user->id);
    }

    public function unsubscribeFrom(User $user)
    {
        return $this->subscriptions()->detach($user->id);
    }

}
