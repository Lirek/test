<?php

namespace App\Http\Controllers;

use App\Sagas;
use Illuminate\Http\Request;
use App\BookAuthor;
use App\Book;
use App\Rating;
use Laracasts\Flash\Flash;
use App\Http\Requests\BookRequest;
use File;
use Auth;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
        $books->each(function ($books) {
            $books->author;
            $books->seller;
            $books->saga;
            $books->rating;
        });
        return view('seller.book.index')->with('book', $books);
    }

    public function create()
    {
        $author = BookAuthor::where('seller_id',Auth::guard('web_seller')->user()->id)
                    ->orderBy('id', 'DESC')
                    ->pluck('full_name', 'id');
        $sagas = Sagas::where('type_saga','Libros')->orderBy('id', 'ASC')->pluck('sag_name', 'id');
        $rating = Rating::orderBy('id', 'DESC')->pluck('r_name','id');

        return view('seller.book.create')
            ->with('author', $author)
            ->with('saga', $sagas)
            ->with('ratin',$rating);
    }

    public function store(BookRequest $request)
    {
        $file = $request->file('cover');
        $name = 'cover_'.time().'.'.$file->getClientOriginalExtension();
        $path1 = public_path().'/images/bookcover/';
        $file->move($path1, $name);

        $files = $request->file('books_file');
        $names = 'book_'.$request->title.'_' . time() . '.' . $files->getClientOriginalExtension();
        $path2 = public_path() . '/book/';
        $files->move($path2, $names);

        $book = new Book($request->all());
        $book->seller_id = \Auth::guard('web_seller')->user()->id;
        $book->author_id = $request->author_id;
        $book->cover = $name;
        $book->books_file = $names;
        $book->status = 2;
        $book->save();

        Flash::success('Se ha registrado '.$book->title.' de forma sastisfactoria')->important();

        return redirect()->route('tbook.index');
    }

    public function edit($id)
    {
        $books = Book::find($id);

        if(\Auth::guard('web_seller')->user()->id === $books->seller_id) {

            $books->author;
            $books->saga;
            $books->rating;
            $author = BookAuthor::where('seller_id',Auth::guard('web_seller')->user()->id)
                    ->orderBy('id', 'DESC')
                    ->pluck('full_name', 'id');
            $sagas = Sagas::orderBy('id', 'ASC')->pluck('sag_name', 'id')->filter();
            $ratings = Rating::orderBy('id','ASC')->pluck('r_name','id');

            return view('seller.book.edit')
                ->with('book', $books)
                ->with('saga', $sagas)
                ->with('author', $author)
                ->with('rating',$ratings);

        }else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('tbook.index');

        }
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->seller_id = \Auth::guard('web_seller')->user()->id;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->original_title = $request->original_title;
        if ($request->cover <> null) {
            $file = $request->file('cover');
            $name = 'cover_' . time() . '.' . $file->getClientOriginalExtension();
            $path1 = public_path() . '/images/bookcover/';
            $file->move($path1, $name);
            $book->cover = $name;
        }
        $book->sinopsis = $request->sinopsis;
        if ($request->books_file <> null) {
            $files = $request->file('books_file');
            $names = 'book_'.$request->title.'_' . time() . '.' . $files->getClientOriginalExtension();
            $path2 = public_path() . '/book/';
            $files->move($path2, $names);
            $book->books_file = $names;
        }
        $book->country = $request->country;
        $book->after = $request->after;
        $book->before = $request->before;
        $book->saga_id = $request->saga_id;
        $book->release_year = $request->release_year;
        $book->rating_id = $request->rating_id;
        $book->cost = $request->cost;
        $book->save();

        Flash::success('Se ha modificado ' . $book->title . ' de forma exitosa')->important();

        return redirect()->route('tbook.index');
    }

    public function show($id)
    {
        $books = Book::find($id);
        $books->each(function ($books) {
            $books->author;
            $books->saga;
            $books->rating;
        });
        return view('seller.book.show')->with('book',$books);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (\Auth::guard('web_seller')->user()->id === $book->seller_id) {

            File::delete(public_path()."/images/bookcover/".$book->cover);
            File::delete(public_path()."/book/".$book->books_file);

            $book->delete();
            Flash::success('Se ha eliminado el libro con exito')->important();
            return redirect()->route('tbook.index');

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('tbook.index');

        }
    }
}
