<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\busModel;
use App\Models\stationModel;
use App\Models\routeModel;

class userController extends Controller
{
    public function home()
    {
        $bus = busModel::all();
        $stations = stationModel::all();
        $routes = routeModel::all();
        $data = compact('bus','stations','routes');
        // print_r(session()->all());
        return view('User.userHome')->with($data);
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
                return redirect('/');
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

    public function searchBus(Request $r)
    {
        // $r->validate([
        //     'from' => 'required',
        //     'to' => 'required',
        //     'date'=>'required'
        //     // 'cpassword' => 'required'
        // ],
        // [
        //     'from.required' => 'Please Select Source',
        //     'to.required' => 'Please Select Destination',
        //     'date.required' => 'Please Select Date'
        //     ]
        // );

        $routes = routeModel::where('startingStationID',$r['from'])->where('endingStationID',$r['to'])->where('date',$r['date'])->get();

        $buses = busModel::all();

        if($routes)
        {
            $data = compact('routes','buses');
            return view('User.searchBus')->with($data);
        }
    }

    public function viewSeat($id)
    {
        // $busSeats = seatModel::where('busNo',$r['busno'])->get();
        $busSeats = DB::select('select * from '.$id.'seatTB');
        $bus = busModel::find($id);
        $data = compact('busSeats','bus');
        return view('User.bookSeat')->with($data);
    }
}
