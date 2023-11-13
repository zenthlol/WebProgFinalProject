<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\BookCategory;
use App\Models\Publisher;

class BookController extends Controller
{
    public function welcome(){
        $bookAll = Book::all(); // ini semua data buku dimskin variable $books
        $categories = Category::all();
        return view('welcome' , compact('bookAll','categories'));

        // ini 'welcome' nama page welcome.blade.php
        // compact('books') itu passing dari controller/variable $books ke view welcomenya


    }   // di compact, string dari dtabase dibuat jadi dlm btk array

    public function bookById($ids){ // function buat return id ke route, tampilin halaman details berdasarkan id buku
        $book = Book::find($ids);
        $categories = Category::all();
        return view('bookDetail', compact('book', 'categories'));
    }



    public function categoryById($id)
    {
        $categories = Category::all();
        $category = Category::where('id','=',$id)->pluck('name')->first();
        $bookId = BookCategory::where('category_id','=',$id)->pluck('book_id');
        $bookCats = Book::findOrFail($bookId);
        return view('category', compact('bookCats','categories','category'));
    }

    public function publisher(){
        $publishers = Publisher::all();

        return view('publisher', compact('publishers'));
    }

    public function contact(){
        return view('contact');
    }
}
