<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Score;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leaderboard extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id','voters','average'
    ];
    public function article(){
        return $this->belongsTo(Article::class); 
    }
    public function scores(){
        return $this->hasMany(Score::class); 
    }
}
