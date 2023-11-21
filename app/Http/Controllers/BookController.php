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

    public function becomeAdmin(){
        return view('admin/index');
    }

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



    public function index (){
        $books = Book::All();
        $publisher = Publisher::all();
        return view('admin/index', compact('books'), compact('publisher'));
    }


    //function untuk halaman admin
    public function adminCreate(){
        $publishers = Publisher::all();
        return view('admin/create', compact('publishers'));
    }

    //function untuk CREATE BOOK (store book ke database)
    public function store(Request $request){
        $request->validate([
            //validasi BOOK
            'title'=>'required|string|min:5|max:100',
            'author'=>'required|string|min:5|max:100',
            'year'=>'required|integer|min:1990|max:2023',
            'synopsis'=>'required|string|min:5|max:200',
            'image'=>'required|string|min:5|max:100',
            'publisher_id' => 'required|exists:publishers,id',
            // validasi CATEGORY
        ]);

        // INSERT BOOKS
        Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'year'=>$request->year,
            'synopsis'=>$request->synopsis,
            'image'=>$request->image,
            'publisher_id' => $request->publisher_id

            // 'publisher_id' => $this->faker->numberBetween(1,5)
        ]);



        // INSERT CATEGORY RELATIONSHIP
        // BookCategory::create([
        //     'book_id' =>$request->book_id,
        //     'category_id'=>$request->category_id
        // ]);

        return redirect('admin/index')->with('status_sukses', 'Book has been successfully added!');

    }




    //function untuk halaman index bookcat
    public function bookCategoryIndex(){
        $bookCats = BookCategory::all();
        $books = Book::all();
        $categories = Category::all();
        return view('bookCategory/index', compact('bookCats'), compact('books'), compact('categories'));
    }

    //function untuk halaman bikin bookcat
    public function bookCategoryCreate(){
        $books = Book::all();
        $categories = Category::all();
        return view('bookCategory/assignCategory', compact('books'), compact('categories'));
    }

    //function untuk ASSIGN CATEGORY
    public function bookCategoryStore(Request $request){
        $request->validate([
            'book_id'=>'required|exists:books,id',
            'category_id'=>'required|exists:categories,id',


        ]);

        // INSERT BOOKS
        BookCategory::create([
            'book_id'=>$request->book_id,
            'category_id'=>$request->category_id,
        ]);

        return redirect('bookCategory/index')->with('status_sukses', 'Book Category has been successfully added!');
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


