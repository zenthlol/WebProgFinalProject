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
        //CARA 1

        // $bookAll = Book::all(); // ini semua data buku dimskin variable $books
        // $categories = Category::all();
        // $searchTerm = request('search');

        // if ($searchTerm) {
        //     $bookAll = $bookAll->filter(function ($book) use ($searchTerm) {
        //         return stripos($book->title, $searchTerm) !== false;
        //     });
        // }

        // return view('welcome' , compact('bookAll','categories'));

        // ini 'welcome' nama page welcome.blade.php
        // compact('books') itu passing dari controller/variable $books ke view welcomenya

        //CARA 2: PAKE QUERY
        $title = $active = 'Home';

        $bookAll = Book::query(); // Start building a query without executing it
        $categories = Category::all();

        if (request()->has('search')) {
            $searchTerm = request('search');
            $bookAll->where('title', 'LIKE', '%' . $searchTerm . '%');
            $title = 'Search Result';
            $active = 'Home';
        }

        $bookAll = $bookAll->get(); // Execute the query and fetch the filtered data

        return view('welcome', compact('bookAll', 'categories', 'title', 'active'));
    }   // di compact, string dari dtabase dibuat jadi dlm btk array

    public function bookById($ids){ // function buat return id ke route, tampilin halaman details berdasarkan id buku
        $book = Book::find($ids);
        $categories = Category::all();
        $title = $book->title;
        $active = 'Home';
        return view('bookDetail', compact('book', 'categories', 'title', 'active'));
    }



    public function categoryById($id){
        $categories = Category::all();
        $category = Category::where('id','=',$id)->pluck('name')->first();
        $title = $category;
        $active = 'Category';
        $bookId = BookCategory::where('category_id','=',$id)->pluck('book_id');
        $bookCats = Book::findOrFail($bookId);
        return view('category', compact('bookCats', 'categories', 'category', 'title', 'active'));
    }

    public function publisher(){
        $title = $active = 'Publisher';

        $publishers = Publisher::all();

        return view('publisher', compact('publishers', 'title', 'active'));
    }

    public function contact(){
        $title = $active = 'Contact';
        return view('contact', compact('title', 'active'));
    }
}
