<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Genre extends Model
{
    use HasFactory;

    protected $fillable=['genre','eng','de'];

    public function articles(){
        return $this->hasMany(Article::class); 
    }
}
