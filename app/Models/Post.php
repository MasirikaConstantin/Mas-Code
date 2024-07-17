<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'titre',
        'contenus',
        'user_id',
        'tag_id',
        'categorie_id',
        'image',
        'codesource',
        'slug',
        'views_count',
        'etat'
    ];
    public function imageUrl(){
        return Storage::disk('public')->url($this->image); 
    }
    public function category(){
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
{
    return $this->hasMany(Commentaire::class);
}
public function reactions()
{
    return $this->hasMany(Reaction::class);
}
    public function incrementViewsCount()
    {
        $this->views_count++;
        $this->save();
    }


}
