<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use App\Models\Article;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'vote','article_id','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class); 
    }
    public function article(){
        return $this->belongsTo(Article::class); 
    }
}
