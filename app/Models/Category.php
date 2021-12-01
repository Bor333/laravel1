<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function rules() {

        return [
            'title' => 'required|min:5|max:20',
            'slug' => 'required|min:3',
        ];
    }

    public function attributeNames() {
        return [
            'title' => 'Заголовок категории',
            'slug' => 'slug категории',
        ];
    }
}
