<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookAuthor;
use App\Seller;
use App\Book;
use Laracasts\Flash\Flash;
use File;

class BooksAuthorsController extends Controller
{

    public function showBooks() {

        $id = BookAuthor::where('seller_id',\Auth::guard('web_seller')->user()->id)->get();
        //dd($id[0]->id);
        $authors = BookAuthor::find($id[0]->id);
        //dd($authors);
        //$books = Book::all();
        $books = $authors->books()->get();
        /*
        $authors->each(function ($authors) {
            $authors->seller;
        });
        $books->each(function ($books){
            $books->author;
        });
        //dd($books);
        //dd($authors->seller->name);
        return view('seller.authorbook.show')
            ->with('author',$authors)
            ->with('book',$books);
        $author = BookAuthor::orderBy('id', 'DESC')->get();
        $author->each(function ($author) {
            $author->seller;
            $author->books;
        });
        dd($author);
        */

        return view('seller.authorbook.show')->with('author', $authors)->with('book',$books);
    }

    public function create() {
        return view('seller.authorbook.create');
    }

    public function store(Request $request) {
        $file = $request->file('photo');
        $name = 'author_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/authorbook/';
        $file->move($path, $name);

        $author = new BookAuthor($request->all());
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        $author->photo = $name;
        $author->save();

        Flash::success('Se ha registrado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->action(
            'BooksAuthorsController@edit',['id'=>\Auth::guard('web_seller')->user()->id]
        );
    }

    public function show() {

        $author = BookAuthor::orderBy('id', 'DESC')->get();
        $author->each(function ($author) {
            $author->seller;
            $author->books;
        });

        return view('seller.authorbook.index')->with('authors', $author);
    }

    public function edit($id) {

        $id = BookAuthor::where('seller_id',\Auth::guard('web_seller')->user()->id)->get();
        $authors = BookAuthor::find($id[0]->id);

        if (\Auth::guard('web_seller')->user()->id === $authors->seller_id) {

            return view('seller.authorbook.edit')->with('author', $authors);

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('authors_books.index');
        }
    }

    public function update(Request $request, $id) {

        $author = BookAuthor::find($id);

        if ($request->photo != null) {
            File::delete(public_path()."/images/authorbook/".$author->photo);
            $file = $request->file('photo');
            $name = 'author_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/authorbook/';
            $file->move($path, $name);
            $author->photo = $name;
        }

        $author->full_name = $request->full_name;
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        $author->email_c;
        $author->google = $request->google;
        $author->instagram = $request->instagram;
        $author->facebook = $request->facebook;
        $author->twitter = $request->twitter;
        $author->save();

        Flash::success('Se ha modificado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->action(
            'BooksAuthorsController@edit',[\Auth::guard('web_seller')->user()->id]
          );
    }

    public function destroy($id) {

        $author = BookAuthor::find($id);
        $book = Book::all();
        $book->each(function ($book){
            $book->author;
        });
        dd($book);
        //dd($author->photo);
        //dd($author->id);
        //$book = Book::find($author->id);
        $book = Book::where('author_id',$author->id)->get();
        //dd(public_path()."/images/bookcover/".$book[0]->cover);

        if (\Auth::guard('web_seller')->user()->id === $author->seller_id) {

            if ($book!=null) {
                File::delete(public_path()."/images/bookcover/".$book[0]->cover);
                File::delete(public_path()."/book/".$book[0]->books_file);
                $book->delete();
            }
            File::delete(public_path()."/images/authorbook/".$author->photo);
            $author->delete();

            Flash::success('Se ha eliminado el autor de forma sastisfactoria');
            return redirect()->route('authors_books.index');

        } else {

            Flash::error('No tienes los permisos necesarios para acceder')->important();
            return redirect()->route('authors_books.index');

        }
    }

    public function register(Request $request) {
        
        $file = $request->file('photo');
        $name = 'author_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/authorbook/';
        $file->move($path, $name);

        $author = new BookAuthor($request->all());
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        $author->photo = $name;
        $author->save();

        Flash::success('Se ha registrado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->route('tbook.create');
    }

}
