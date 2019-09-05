<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Http\Requests\Api\Auth\RegisterFormRequest;

class UserController extends Controller
{
    public function store(RegisterFormRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email'),
            ['password' => bcrypt($request->password)]
        ));
        $user->status = 'admin';
        $user->save();
        return redirect('admin/showadd');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //  $userChecklists = User::find($user_id)->checklists();

        return view('auth.login');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request['user_id']);
       // dd($request);
        if (!is_null($request['name']))
            $user->name = $request['name'];
        if (!is_null($request['email']))
            $user->email = $request['email'];

        $user->save();

        return redirect('admin');
    }

    public function toblock($id) {
        $user = User::find($id);
        $user->banned = 1;
        $user->save();
        return redirect('admin');
    }

    public function unlock($id) {
        $user = User::find($id);
        $user->banned = 0;
        $user->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin');
    }
}
