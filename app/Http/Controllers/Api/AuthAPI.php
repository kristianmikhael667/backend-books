<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthAPI extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            // return response()->json(['error' => $validator->messages()], 200);
            return response()->json([
                'status' => 'error',
                'success' => false,
                'code' => 401,
                'message' => 'Login credentials are invalid.',
            ], 200);
        }

        $getuser = User::where('email', $credentials['email'])->first();
        if (!$getuser) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'code' => 404,
                'message' => 'Login credentials are invalid.',
            ], 200);
        }
        $payloadable = [
            'uid' => $getuser->uid,
            'profile_photo_path' => $getuser->profile_photo_path
        ];
        try {
            if (!$token = JWTAuth::claims($payloadable)->attempt($credentials)) {
                return response()->json([
                    'status' => 'invalid',
                    'code' => 400,
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 200);
            }

            // if ($getuser->email_verified_at == null) {
            //     return response()->json([
            //         'status' => 'noverify',
            //         'error' => false,
            //         'message' => 'Your Email must verify',
            //     ], 400);
            // }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Could not create token.',
            ], 500);
        }

        //Token created, return with success response and jwt token
        return response()->json([
            'status' => 'success',
            'success' => true,
            'code' => 200,
            'token' => $token,
            'users' => $getuser,
            'expired' => Carbon::now()->addDays(10)->timestamp
        ]);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'invalid',
                'success' => false,
                'message' => 'Logout error.',
            ], 400);
        }

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
