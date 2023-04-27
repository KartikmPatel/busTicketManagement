<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function home()
    {
        print_r(session()->all());
        return view('User.userHome');
    }

    public function signUp(Request $r)
    {
        $r->validate([
                'username' => 'required',
                'password' => 'required'
                // 'cpassword' => 'required'
            ],
            [
                'username.required' => 'Please enter UserName',
                'password.required' => 'Please enter Password'
                // 'password.confirmed' => 'Passwords must be same'
                // 'cpassword.required' => 'Password and Confirm Password must be same'
                ]
            );

                $user = new userModel();
                $user->userName = $r['username'];
                $user->password = Hash::make($r['password']);
                $user->save();

                return redirect('/');
    }

    public function login(Request $r)
    {
        $r->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
            // 'cpassword' => 'required'
        ],
        [
            'loginusername.required' => 'Please enter UserName',
            'loginpassword.required' => 'Please enter Password',
            ]
        );
        $user = userModel::where('userName',$r['loginusername'])->first();
        if($user || Hash::check('password',$r['loginpassword']))
        {
            session()->put('username',$user->userName);

            if(session('username') == "Admin")
            {
                return redirect('/adminHome');
            }
            else{
                return view('User.userHome')->with('success','You are chutiya');
            }
        }
        else
        {
        }
    }

    public function logout()
    {
        session()->forget('username');

        return redirect('/');
    }
}
