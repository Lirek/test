<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookAuthor;
use App\Seller;
use App\Book;
use Laracasts\Flash\Flash;

class BooksAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = BookAuthor::orderBy('id', 'DESC')->paginate('10');
        $author->each(function ($author) {
            $author->seller;
            $author->books;
        });
        //dd($author);

        return view('seller.authorbook.index')->with('authors', $author);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.authorbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        $name = 'author_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/authorbook/';
        $file->move($path, $name);

        $author = new BookAuthor($request->all());
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        $author->photo = $name;
//        dd($author->photo);
//        dd($author,$author->photo,$file);
        $author->save();

        Flash::info('Se ha registrado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->route('authors_books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = BookAuthor::find($id);
        $authors->each(function ($authors) {
            $authors->seller;
        });
        $books = Book::all();
        $books->each(function ($books){
            $books->author;
        });
        return view('seller.authorbook.show')
            ->with('author',$authors)
            ->with('book',$books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = BookAuthor::find($id);

        if (\Auth::guard('web_seller')->user()->id === $authors->seller_id) {

            return view('seller.authorbook.edit')->with('author', $authors);

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('authors_books.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = BookAuthor::find($id);
        $author->full_name = $request->full_name;
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        if ($request->photo <> null) {
            $file = $request->file('photo');
            $name = 'author_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/authorbook/';
            $file->move($path, $name);
            $author->photo = $name;
        }
        $author->email_c;
        $author->google = $request->google;
        $author->instagram = $request->instagram;
        $author->facebook = $request->facebook;
        $author->twitter = $request->twitter;
        $author->save();

        Flash::success('Se ha modificado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->route('authors_books.index');
    }

    public function destroy($id)
    {
        $author = BookAuthor::find($id);
        //dd($author->id);
        $book = Book::find($author->id);
        //dd($book);

        if (\Auth::guard('web_seller')->user()->id === $author->seller_id) {

            //$author->book()->delete();
            if ($book!=null) {
                $book->delete();
            }
            $author->delete();

            Flash::success('Se ha eliminado el autor de forma sastisfactoria');

            return redirect()->route('authors_books.index');

        } else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('authors_books.index');

        }
    }

    public function register(Request $request)
    {
        $file = $request->file('photo');
        $name = 'author_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/authorbook/';
        $file->move($path, $name);

        $author = new BookAuthor($request->all());
        $author->seller_id = \Auth::guard('web_seller')->user()->id;
        $author->photo = $name;
//        dd($author->photo);
//        dd($author,$author->photo,$file);
        $author->save();

        Flash::success('Se ha registrado ' . $author->full_name . ' de forma sastisfactoria')->important();

        return redirect()->route('tbook.create');
    }

}
