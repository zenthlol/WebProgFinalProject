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
        return $this->hasMany(Book::class,'book_categories','book_id','category_id');
        //nama table, nama id, nama tujuan pny id
    }
}
