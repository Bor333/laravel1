<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //protected $table = 'my_news';
    //protected $primaryKey = 'news_id';
    //public $timestamps = false;

    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

    public function category() {
        return $this->belongsTo(Categories::class);
    }

}

