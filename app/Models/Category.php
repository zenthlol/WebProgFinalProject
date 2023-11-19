<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function categoryToBook(){
        return $this->belongsToMany(Book::class,'book_categories','category_id', 'book_id');
        //nama table pviot, nama id start di pivot, nama id finish di pivot
    }
}
