<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Checklist;

class UserChecklistsController extends Controller
{
    public function index($id) {
        $userChecklists = User::find($id)->checklists()->paginate(6);

        return view('admin.checklists')->with(['checklists'=>$userChecklists]);
    }

    public function show($id) {
        $listitems = Checklist::find($id)->listitems()->paginate(6);;

        return view('admin.listitems')->with(['listitems'=>$listitems]);
    }
}
