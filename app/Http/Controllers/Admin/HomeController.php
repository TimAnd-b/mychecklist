<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class HomeController extends Controller
{
    public function index(Request $request) {
        $users = User::paginate(9);
        return view('admin.home')->with(['users' => $users, 'you_id' => $request->user()->id]);
    }

    public function show() {
        return view('auth.register');
    }
}
