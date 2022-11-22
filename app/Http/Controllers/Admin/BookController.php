<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\QuantityBook;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->with(['catalog', 'qtybook'])->filter(request(['search']))->paginate(10)->withQueryString();
        // echo json_encode($books);
        // die;
        return view('admin.list-book', [
            'page' => 'Book',
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-book', [
            'page' => 'Create Books',
            'categories' => Catalog::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'catalog_id' => 'required',
            'author_book' => 'required',
            'title_book' => 'required',
            'publish_book' => 'required',
            'sinopsis_book' => 'required',
            'publish_date' => 'required',
            'cover_book' => 'image|file|max:2048',
        ]);
        if ($request->file('cover_book')) {
            $validatedData['cover_book'] = $request->file('cover_book')->store('post-image');
        }
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title_book);
        $validatedData['slug'] = $slug;
        $validatedData['publish_date'] = $request->publish_date;
        $validatedData['name_book'] = $validatedData['title_book'];

        $uidbook = Book::create($validatedData);

        // Create qty
        $inputs = $request->all();
        $inputs['uid_book'] = $uidbook['uid'];

        QuantityBook::create($inputs);

        return redirect('/administrator/book')->with('success', 'New Book has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
