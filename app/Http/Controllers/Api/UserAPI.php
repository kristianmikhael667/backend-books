<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookborrow;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserAPI extends Controller
{
    public function history()
    {
        try {
            $user = Auth::user();
            $historyBorrow = Bookborrow::where('user_uid', $user->uid)->orderBy('created_at', 'desc')->get();
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

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error([
                'error' => $validator->errors()
            ], 'Update photo fails', 401);
        }

        if ($request->file('file')) {
            $file = $request->file->store('post-image');

            $user = Auth::user();

            DB::table('users')->where('uid', $user->uid)->update([
                'profile_photo_path' => $file,
            ]);
            return ResponseFormatter::success([$file], 'File successfully uploaded');
        }
    }
}
