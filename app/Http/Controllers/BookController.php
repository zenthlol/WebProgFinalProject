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

    public function becomeAdmin(){
        return view('admin/index');
    }

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

    //function untuk halaman admin
    public function adminCreate(){
        return view('admin/create');
    }

    public function index (){
        $books = Book::All();
        return view('admin/index', compact('books'));
    }

    //function untuk CREATE BOOK (store book ke database)
    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|min:5|max:100',
            'author'=>'required|string|min:5|max:100',
            'year'=>'required|integer|min:1990|max:2023',
            'synopsis'=>'required|string|min:5|max:200',
            'image'=>'required|string|min:5|max:100',
            'publisher_id' => 'required|exists:publishers,id'
        ]);

        Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'year'=>$request->year,
            'synopsis'=>$request->synopsis,
            'image'=>$request->image,
            'publisher_id' => $request->publisher_id

            // 'publisher_id' => $this->faker->numberBetween(1,5)
        ]);

        return redirect('admin/index')->with('status_sukses', 'Book has been successfully added!');

    }

    //function untuk UPDATE/EDIT BOOK
    //ini ketika klik dati hlmn index, mau cari buku yg mana yg bakal di update, trs di alihin ke halaman edit, dan passing id dan data buku ke halaman tsb
    public function edit($id){
        $book = Book::findOrFail($id);
        return view('admin/edit', compact('book'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required|string|min:5|max:100',
            'author'=>'required|string|min:5|max:100',
            'year'=>'required|integer|min:1990|max:2023',
            'synopsis'=>'required|string|min:5|max:200',
            'image'=>'required|string|min:5|max:100',
            'publisher_id' => 'required|exists:publishers,id'
        ]);

        $book=Book::findOrFail($id);
        $book->update([
            'title' => $request -> title,
            'author' => $request -> author,
            'year' => $request -> year,
            'synopsis' => $request -> synopsis,
            'image' => $request -> image,
            'publisher_id' => $request -> publisher_id,
        ]);


        return redirect('admin/index')->with('status_sukses', 'Book has been Edited!');


    }

    // function DELETE
    public function destroy($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/admin/index')->with('status_sukses', 'Book has been Deleted!');
    }
}


