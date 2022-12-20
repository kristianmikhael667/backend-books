<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // Top Viewer
        $top10views = Book::join("viewbook", "viewbook.uid_book", "=", "book.uid")
            ->groupBy("book.id")
            ->groupBy("book.uid")
            ->groupBy("book.slug")
            ->groupBy("book.catalog_id")
            ->groupBy("book.author_book")
            ->groupBy("book.title_book")
            ->groupBy("book.publish_book")
            ->groupBy("book.sinopsis_book")
            ->groupBy("book.name_book")
            ->groupBy("book.cover_book")
            ->groupBy("book.status_book")
            ->groupBy("book.publish_date")
            ->groupBy("book.created_at")
            ->groupBy("book.updated_at")
            ->limit(10)
            ->orderBy(DB::raw('COUNT(book.uid)', 'desc'), 'desc')
            ->get(array(DB::raw('COUNT(book.uid) as total_views'), 'book.*'));

        $posts = Book::join("reviewbook", "reviewbook.book_uid", "=", "book.uid")
            ->groupBy("book.id")
            ->groupBy("book.uid")
            ->groupBy("book.slug")
            ->groupBy("book.catalog_id")
            ->groupBy("book.author_book")
            ->groupBy("book.title_book")
            ->groupBy("book.publish_book")
            ->groupBy("book.sinopsis_book")
            ->groupBy("book.name_book")
            ->groupBy("book.cover_book")
            ->groupBy("book.status_book")
            ->groupBy("book.publish_date")
            ->groupBy("book.created_at")
            ->groupBy("book.updated_at")
            ->limit(6)
            ->orderBy(DB::raw('COUNT(reviewbook.total_review)', 'desc'), 'asc')
            ->get(array(DB::raw('AVG(reviewbook.total_review) as avg'), 'book.*'));
        return view('admin.dashboard', [
            'books' => $top10views,
            'reviewer' => $posts
        ]);
    }
}
