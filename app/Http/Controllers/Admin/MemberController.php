<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class MemberController extends Controller
{
    public function index()
    {
        $dataMember = Member::latest()->paginate(10)->withQueryString();

        $d = new DNS1D();
        $d->setStorPath(__DIR__ . '/cache/');

        return view('admin.list-member', [
            'page' => 'Member Library',
            'members' => $dataMember,
            'barcode' => $d
        ]);
    }
}
