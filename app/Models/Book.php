<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year',
        'synopsis',
        'image',
        'publisher_id'


    ];

    public function bookToPublisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id',);
    }

    public function bookToCategory(){
        return $this->belongsToMany(Category::class,'book_categories','book_id', 'category_id');
        //nama table, nama id, nama tujuan pny id
    }
}
