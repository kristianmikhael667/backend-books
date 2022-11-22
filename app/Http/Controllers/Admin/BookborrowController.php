<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookborrow;

class BookborrowController extends Controller
{
    public function index()
    {
        $borrowBook = Bookborrow::latest()->where('status_book', '=', 'borrow')->orWhere('status_book', '=', 'none')->paginate(10)->withQueryString();
        return view('admin.list-borrow-book', [
            'page' => 'Borrow Book',
            'borrows' => $borrowBook
        ]);
    }

    public function returnbook()
    {
        $returnBook = Bookborrow::latest()->where('status_book', '=', 'return')->paginate(10)->withQueryString();
        return view('admin.list-return-book', [
            'page' => 'Return Book',
            'returnbooks' => $returnBook
        ]);
    }
}
