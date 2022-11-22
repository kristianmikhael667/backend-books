<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use App\Models\Member;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class MemberApi extends Controller
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
            $input = $request->all();
            $input['number_card'] = rand(10000000, 1000000000000);

            $checkmem = Member::where('phone', $input['phone'])->first();
            if ($checkmem) {
                return ResponseFormatter::error($data = null, "You already Member", 403);
            }

            $data = Member::create($input);
            if ($data) {
                return ResponseFormatter::success($data, 'Success Created Member');
            }
        } catch (Exception $e) {
            dd($e);
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
    }

    public function memberphone(Request $request)
    {
        $phones = $request->input('phone');
        $memberphone = Member::where('phone', $phones)->first();

        if ($memberphone) {
            return ResponseFormatter::success(
                $memberphone,
                'Data Member Registered'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Member Unregistered',
                404
            );
        }
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
