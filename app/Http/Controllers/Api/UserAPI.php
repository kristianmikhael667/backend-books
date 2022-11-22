<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookborrow;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserAPI extends Controller
{
    public function history()
    {
        try {
            $user = Auth::user();
            $historyBorrow = Bookborrow::where('user_uid', $user->uid)->get();
            if ($historyBorrow) {
                $history = $historyBorrow->map(function ($item) {
                    return [
                        'code_book' => $item->code_book,
                        'title_book' => $item->books['title_book'],
                        'tot_borrow' => $item->qty,
                        'status_borrow' => $item->status_book,
                        'date_borrow' => $item->date_borrow,
                        'date_return' => $item->date_return,
                        'cover_book' => $item->books['cover_book'],
                        'publish_book' => $item->books['publish_book'],
                        'name_catalog' => $item->books->catalog['name_catalog']
                    ];
                });
                return ResponseFormatter::success($history, "History Book", 200);
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(null, $e, 500);
        }
    }

    public function getprofile(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            return ResponseFormatter::success($user, 'My Profile');
        }
        return ResponseFormatter::error(null, 'Error');
    }
}
