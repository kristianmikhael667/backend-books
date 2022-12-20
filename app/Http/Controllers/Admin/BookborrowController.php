<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookborrow;
use Illuminate\Support\Facades\DB;

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

    public function changestatus($id){
       
        $uid = substr($id, 0, 1);
        
        if($uid == 1){
            $status_book = "borrow";
        }
        if($uid == 0){
            $status_book = "reject";
        }
        
        $str = substr($id, 1);
       
        DB::table('bookborrow')->where('uid', $str)->update([
            'status_book' => $status_book
        ]);

        return redirect('/administrator/databook/borrowbook')->with('success', 'Post has been updated!');
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
