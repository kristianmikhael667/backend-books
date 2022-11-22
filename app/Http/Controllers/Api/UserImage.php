<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class UserImage extends Controller
{
    public function image($fileName)
    {
        $path = storage_path('app/post-image/' . $fileName);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
