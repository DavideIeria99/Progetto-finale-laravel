<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Image;
use App\Models\Leaderboard;
use App\Models\Score;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;
protected $fillable = [
    'name','price','description','user_id','genre_id'
];
    // return array;

public function toSearchableArray(){
    $genre=$this->genre;
    $array=[
        'id'=>$this->id,
        'name'=>$this->name,
        'description'=>$this->description,
        'genre'=>$this->genre
    ];
    return $array;
}

//   @return array 


public function user(){
    return $this->belongsTo(User::class); 
}
public function genre(){
    return $this->belongsTo(Genre::class); 
}
public function scores(){
    return $this->hasMany(Score::class); 
}
public function leaderboard(){
    return $this->hasOne(Leaderboard::class); 
}
//1-n images
    public function images()
    {
        return $this->hasMany(Image::class);
    }


public function setAccepted( $value){
    $this->is_accepted = $value;
    $this->save();
    return true;

}

public static function toBeRevisionedCount(){
return Article::where('is_accepted', null)->count();
}


}
