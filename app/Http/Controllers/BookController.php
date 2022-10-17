<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //API
    public function index(){
        return Book::latest()->paginate(5);
    }

    public function allBooks(){
        $books = Book::all();
        return view('admin.home',compact('books'));
    }

    //API
    public function addBook(Request $request){

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'file' => 'required'
        ]);

                //Handles file uploads
        $file = time().'.'.$request->file->getClientOriginalExtension();
        $request->file('file')->move("Books/",$file);

        Book::insert([
            'name' => $request->name,
            'author' => $request->author,
            'file' => $file
        ]);

        return  "Your file has been Uploaded";

    }

    public function newBooks(){
        return view('admin.addbook');
    }

    public function addBooks(Request $request){

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        //Handles file uploads
        $file = time().'.'.$request->file->getClientOriginalExtension();
        $request->file('file')->move("Books/",$file);

        Book::insert([
            'name' => $request->name,
            'author' => $request->author,
            'file' => $file
        ]);

        return redirect()->route('books');

    }

    //API
    public function deleteBook($id){
        $dBook =Book::find($id);

        $dBook ->delete();

        return  "Your file has been deleted";
    }

    public function deleteBooks($id){
        $dBook = Book::find($id);

        $dBook ->delete();

        return redirect()->route('books');
    }

    //API
    public function updateBook(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'file' => 'required'
        ]);
                //Handles file uploads
        $file = time().'.'.$request->file->getClientOriginalExtension();
        $request->file('file')->move("Books/",$file);

        $uBook = Book::find($id)->update([
            'name' => $request->name,
            'author' => $request->author,
            'file' => $file
        ]);

        return  "Your file has been Updated";

    }


    public function singleBook($id)
    {
        $sBook = Book::find($id);

        // dd($sBook);
        return view('admin.editbook',compact('sBook'));
    }

    public function updateBooks(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'file' => 'required'
        ]);
                //Handles file uploads
        $file = time().'.'.$request->file->getClientOriginalExtension();
        $request->file('file')->move("Books/",$file);

        $uBook = Book::find($id)->update([
            'name' => $request->name,
            'author' => $request->author,
            'file' => $file
        ]);

        return view('admin.home',compact('books'));

    }



    public function requestBook(Request $request, $id){

        Book::find($id)->update([
            'request' => 1
        ]);

        return 'Book has been requested';
    }

    public function DeclineBook(Request $request, $id){
        Book::find($id)->update([
            'request' => 0
        ]);

        return 'Book request declined';
    }
}
