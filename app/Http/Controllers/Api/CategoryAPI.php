<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CategoryAPI extends Controller
{
    public function getCategory()
    {
        try {
            $category = Catalog::all();
            if ($category) {
                return ResponseFormatter::success($category, "Category has success", 200);
            }
            return ResponseFormatter::error($data = null, "You haven't member", 404);
        } catch (\Throwable $th) {
            return ResponseFormatter::error($data = null, "Server Error", 500);
        }
    }

    public function getProductbyCat(Request $request)
    {
        try {
            $cat = $request->id;
            $catalog = Book::where('catalog_id', $cat)->get();
            if ($catalog) {
                return ResponseFormatter::success($catalog, "Get Product by Category has success", 200);
            }
            return ResponseFormatter::error($data = null, "You haven't member", 404);
        } catch (\Throwable $th) {
            return ResponseFormatter::error($data = null, "Server Error", 500);
        }
    }
}
