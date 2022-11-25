<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Helpers\TransformBook;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ReviewBook;
use App\Models\User;
use App\Models\ViewBook as ModelsViewBook;
use Carbon\Carbon;
use hisorange\BrowserDetect\Parser as Browser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookAPI extends Controller
{
    public function reviewbook(Request $request)
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

            $checkReview = ReviewBook::where('user_uid', $input['user_uid'])->where('book_uid', $input['book_uid'])->first();

            if ($checkReview) {
                return ResponseFormatter::error($data = null, "You already review", 404);
            }

            // Check validation range review
            if ($input['total_review'] > 5 || $input['total_review'] < 1) {
                return ResponseFormatter::error($data = null, "Range review 1 - 5", 403);
            }

            $data = ReviewBook::create($input);
            if ($data) {
                return ResponseFormatter::success($data, 'Success Created Book Borrow');
            }
        } catch (Exception $e) {
            dd($e);
            return ResponseFormatter::error($data = null, "Server fails", 500);
        }
    }

    public function getDetailMostReview(Request $request)
    {
        try {
            $book_id = $request->id;

            $slugBook = Book::where('slug', $book_id)->first();

            if (!$slugBook) {
                return ResponseFormatter::error($data = null, "Empty book", 404);
            }

            // Check browser
            if (Browser::isChrome() || Browser::isOpera() || Browser::isSafari() || Browser::isFirefox() || Browser::isEdge()) {
                $browsers = Browser::browserName();
                $browsers_name = preg_replace('/[0-9]+/', '', $browsers);
                $browsers_names = str_replace(".", "", $browsers_name);
            } else {
                $browsers_names = "Others";
            }

            // Check Device
            if (Browser::isDesktop() || Browser::isMobile() || Browser::isTablet()) {
                $platforms = Browser::deviceType();
                $platforms_name = preg_replace('/[0-9]+/', '', $platforms);
                $platforms_names = str_replace(".", "", $platforms_name);
            } else {
                $platforms_names = "Others";
            }

            // Check merk hp
            if (Browser::deviceFamily() == "Apple" || Browser::deviceFamily() == "Samsung" || Browser::deviceFamily() == "Xiaomi" || Browser::deviceFamily() == "OPPO" || Browser::deviceFamily() == "Vivo") {
                $device = Browser::deviceFamily();
                $device_name = preg_replace('/[0-9]+/', '', $device);
                $device_names = str_replace(".", "", $device_name);
            } else {
                $device_names = "Others";
            }

            // Cek login
            $token = JWTAuth::parseToken();
            $login = $token->getPayload()->get('uid');

            // Create view book
            ModelsViewBook::create([
                'uid_book' => $slugBook->uid,
                'slug' => $slugBook->slug,
                'url' => request()->url() . '?slug=' . $slugBook->slug,
                'session_id' => '-',
                'user_id' => $login,
                'ip'  => request()->ip(),
                'agent' => $browsers_names,
                'platform' =>  $platforms_names,
                'device' => $device_names
            ]);

            $totalCount = ReviewBook::where('book_uid', $slugBook->uid)
                ->count();
            $ratingAVG = ReviewBook::where('book_uid', $slugBook->uid)
                ->avg('total_review');

            // rate 5
            $rating5 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 5)->count();

            // rate 4.5
            $rating4_5 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 4.5)->count();

            // rate 4.0
            $rating4 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 4.0)->count();

            // rate 3.5
            $rating3_5 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 3.5)->count();

            // rate 3
            $rating3 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 3)->count();

            // rate 2.5
            $rating2_5 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 2.5)->count();

            // rate 2
            $rating2 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 2)->count();

            // rate 1.5
            $rating1_5 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 1.5)->count();

            // rate 1
            $rating1 = ReviewBook::where('book_uid', $slugBook->uid)->where('total_review', 1)->count();

            $booksdet = TransformBook::books($slugBook);

            $data = [
                "databook" => $booksdet,
                "totalCount" => $totalCount,
                "averageRating" => $ratingAVG,
                "ratingstart5" => $rating5,
                "ratingstart4.5" => $rating4_5,
                "ratingstart4" => $rating4,
                "ratingstart3.5" => $rating3_5,
                "ratingstart3" => $rating3,
                "ratingstart2.5" => $rating2_5,
                "ratingstart2" => $rating2,
                "ratingstart1.5" => $rating1_5,
                "ratingstart1" => $rating1
            ];

            if (!$data) {
                return ResponseFormatter::error($data = null, "Empty data", 404);
            }
            return ResponseFormatter::success($data, 'Success Get Book');
        } catch (Exception $e) {
            dd($e);
            return ResponseFormatter::error($data = null, "Server Error", 500);
        }
    }

    public function newsbook()
    {
        try {
            $limit = 10;
            // $posts = Book::whereDate('created_at', Carbon::today())->paginate($limit)->onEachSide(1);
            $posts = DB::table('book')->select(DB::raw('*'))
                ->whereRaw('Date(created_at) = CURDATE()')->paginate($limit);

            if ($posts) {
                return ResponseFormatter::success(
                    $posts,
                    'Data Books retrieved successfully',
                    200
                );
            } else {
                return ResponseFormatter::success(
                    null,
                    'Empty Data Book',
                    404
                );
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(
                null,
                'Server Error',
                500
            );
        }
    }

    public function allbooks()
    {
        try {
            $limit = 10;
            $posts = Book::orderBy('created_at', 'desc')->paginate($limit)->onEachSide(1);
            if ($posts) {
                return ResponseFormatter::success(
                    $posts,
                    'Data Books retrieved successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Empty Data Book',
                    400
                );
            }
        } catch (Exception $e) {
            dd($e);
            return ResponseFormatter::error(
                null,
                'Server Error',
                500
            );
        }
    }

    public function viewersbook()
    {
        try {
            $posts = Book::join("viewbook", "viewbook.uid_book", "=", "book.uid")
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
                ->orderBy(DB::raw('COUNT(book.uid)', 'desc'), 'desc')
                ->get(array(DB::raw('COUNT(viewbook.uid_book) as total_views'), 'book.*'));
            if ($posts) {
                return ResponseFormatter::success(
                    $posts,
                    'Data Book retrieved successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'No Book',
                    404
                );
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(
                null,
                'Server Error',
                500
            );
        }
    }

    public function avgreviewbook()
    {
        try {
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
                ->get(array(DB::raw('AVG(reviewbook.total_review) as average_review'), 'book.*'));
            if ($posts) {
                return ResponseFormatter::success(
                    $posts,
                    'Data Book AVG retrieved successfully'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'No Book Avg',
                    404
                );
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(
                null,
                'Server Error',
                500
            );
        }
    }
}
