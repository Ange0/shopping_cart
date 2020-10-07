<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function getSignUp(){
       return view('user.signup');
    }

    public function postSignUp(Request $request){
        $this->validate($request,[
            'email'=>'email|required:unique:users',
            'password'=>'required|min:4'
        ]);

        $user=new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        return redirect()->route('product.index');
    }
}
