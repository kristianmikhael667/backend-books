<?php

namespace App\Http\Controllers\Api;

use App\Helpers\GenerateCode;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book as ModelsBook;
use App\Models\Bookborrow;
use App\Models\Member;
use App\Models\QuantityBook;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookBorrowAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $token = JWTAuth::parseToken();
            $input = $request->all();
            $input['user_uid'] = $token->getPayload()->get('uid');

            // check user pending
            $checkUser = User::where('uid', $input['user_uid'])->first();
            if ($checkUser->verify == 'pending' || $checkUser->verify == 'reject') {
                return ResponseFormatter::error($data = null, "You account must accept by admin", 403);
            }

            // check user already member
            // $checkMember = Member::where('phone', $checkUser->phone)->first();
            // if (!$checkMember) {
            //     return ResponseFormatter::error($data = null, "You haven't member", 404);
            // }

            // check book available
            $checkBook = ModelsBook::where('uid', $input['book_uid'])->first();
            if (!$checkBook) {
                return ResponseFormatter::error($data = null, "Book not found", 404);
            }

            $qtyBook = QuantityBook::where('uid_book', $checkBook->uid)->first();

            // check input more qty
            if ($input['qty'] > $qtyBook->qty) {
                return ResponseFormatter::error($data = null, "You Select More Qty", 400);
            }

            // check qty book
            if ($qtyBook->qty <= 0) {
                return ResponseFormatter::error($data = null, "Book empaty", 400);
            }
            $input['book_uid'] = $checkBook->uid;

            $input['code_book'] = GenerateCode::generetecode();

            // Deduct qty if borrow
            DB::table('quantity_books')->where('uid_book', $checkBook->uid)->update([
                'qty' => $qtyBook->qty - $input['qty'],
            ]);
            echo 'msk 2';
            die;
            $data = Bookborrow::create($input);
            if ($data) {
                return ResponseFormatter::success($data, 'Success Created Book Borrow');
            }
        } catch (Exception $e) {
            echo 'rusak pala kau';
            return ResponseFormatter::error($data = null, $e, 500);
        }
    }

    public function returnback(Request $request)
    {
        try {
            $input = $request->all();

            //check user
            $token = JWTAuth::parseToken();
            $input['user_uid'] = $token->getPayload()->get('uid');

            $checkCode = Bookborrow::where('code_book', $input['code_book'])->where('user_uid', $input['user_uid'])->first();

            if ($checkCode == null) {
                return ResponseFormatter::error(null, 'Login Block', 403);
            }

            if ($checkCode->qty == 0) {
                return ResponseFormatter::error(null, 'You Already Return Book', 400);
            }

            $book = QuantityBook::where('uid_book', $checkCode->book_uid)->first();

            // Plus qty if return
            DB::table('quantity_books')->where('uid_book', $checkCode->book_uid)->update([
                'qty' => $book->qty + $checkCode->qty,
            ]);

            DB::table('bookborrow')->where('code_book', $input['code_book'])->update([
                'qty' => 0,
                'status_book' => 'return'
            ]);
            // $data = Bookborrow::create($input);
            // if ($data) {
            return ResponseFormatter::success(null, 'Success Return Book');
            // }
        } catch (Exception $e) {
            return ResponseFormatter::error($data = null, $e, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
