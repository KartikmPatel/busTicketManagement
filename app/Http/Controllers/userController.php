<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use App\Models\busModel;
use App\Models\stationModel;
use App\Models\routeModel;
use App\Models\bookingModel;
use App\Models\historyModel;
use PDF;

class userController extends Controller
{
    public function home()
    {
        // App::setLocale($locale);
        $bus = busModel::all();
        $stations = stationModel::all();
        $routes = routeModel::all();
        $data = compact('bus','stations','routes');
        // print_r(session()->all());
        return view('User.userHome')->with($data);
    }

    public function signUp(Request $r)
    {
        // $r->validate([
        //         'username' => 'required',
        //         'password' => 'required'
        //         // 'cpassword' => 'required'
        //     ],
        //     [
        //         'username.required' => 'Please enter UserName',
        //         'password.required' => 'Please enter Password'
        //         // 'password.confirmed' => 'Passwords must be same'
        //         // 'cpassword.required' => 'Password and Confirm Password must be same'
        //         ]
        //     );

                $user = new userModel();
                $user->userName = $r['username'];
                $user->password = $r['password'];
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
        $user = userModel::where('userName',$r['loginusername'])->where('password',$r['loginpassword'])->first();
        if($user)
        {
            session()->put('userid',$user->userID);
            session()->put('username',$user->userName);

            if(session('username') == "Admin")
            {
                $message = "adminLogin";
                return $message;
            }
            else{
                $message = "userLogin";
                return $message;
            }
        }
        else
        {
            $message = "errorLogin";
            return $message;
        }
    }

    public function logout()
    {
        session()->forget('username');
        session()->forget('userid');
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

        $routes = routeModel::where('startingStationID',$r['from'])->where('endingStationID',$r['to'])->get();

        $buses = busModel::all();
        $date = $r['date'];
        if($routes)
        {
            $data = compact('routes','buses','date');
            return view('User.searchBus')->with($data);
        }
    }

    public function viewSeat(Request $r)
    {
        // $busSeats = seatModel::where('busNo',$r['busno'])->get();
        $date = $r['date'];
        $busSeats = DB::select('select * from '.$r['bno'].'seatTB where date="'.$date.'"');
        $rid = $r['rid'];
        $from = $r['from'];
        $to = $r['to'];
        $time = $r['time'];
        $fare = $r['fare'];
        $bus = busModel::find($r['bno']);
        $data = compact('busSeats','bus','rid','date','time','fare','from','to');
        return view('User.bookSeat')->with($data);
    }

    public function booking(Request $r)
    {
        // $rid = $r['rid'];
        $bno = $r['bno'];
        $uid = session('userid');
        $ssID = stationModel::where('stationID',$r['from'])->first();
        $esID = stationModel::where('stationID',$r['to'])->first();
        $date = $r['date'];
        $time = $r['time'];
        $seatno=$r['display'];
        $fare=$r['fare'];
        $from = $ssID->stationName;
        $to = $esID->stationName;

        $book = new bookingModel;
        $book->busNo = $bno;
        $book->userID = $uid;
        $book->seatNo = $seatno;
        $book->fare = $fare;
        $book->from = $from;
        $book->to = $to;
        $book->date = $date;
        $book->time = $time;
        $book->save();

        DB::insert('insert into '.$bno.'seatTB values("'.$date.'",'.$seatno.')');
        // return redirect('/');

        $station = stationModel::all();
        $ticket = bookingModel::all();
        $uname = session('username');
        $data = compact('bno','uname','seatno','fare','from','to','date','time','station','ticket');
        return view("User.viewTicket")->with($data);
    }

    public function downloadTicket(Request $r)
    {
        $st1 = $r['sname1'];
        $st2 = $r['sname2'];
        $uname = $r['uname'];
        $bno = $r['bno'];
        $seatno = $r['seatno'];
        $date = $r['date'];
        $fare = $r['fare'];
        $tid = $r['ticketID'];

        $pdf_view = PDF::loadView('User.downloadTicket',compact('st1','st2','uname','bno','seatno','date','fare','tid'));
        return $pdf_view->download('ticket.pdf');
    }

    public function viewProfile()
    {
        $userid = session('userid');
        $user = userModel::find($userid);

        $data = compact('user');
        return view('User.viewProfile')->with($data);
    }

    public function editProfile(Request $r)
    {
        $userid = session('userid');
        $user = userModel::find($userid);

        $user->userName = $r['username'];
        $user->email = $r['email'];
        $user->mobileNo = $r['mobileno'];
        $user->city = $r['city'];
        $user->save();

        return redirect('viewProfile');
    }

    public function changePassword()
    {
        return view('User.changePassword');
    }

    public function passwordChange(Request $r)
    {
        $cPassword = userModel::where('password',$r['oldPassword'])->first();
        if($cPassword)
        {
            $cPassword->password = $r['newPassword'];
            $cPassword->save();
            $message = "passwordDone";
            return $message;
        }
        else
        {
            $message = "passwordError";
            return $message;
        }
    }

    public function viewHistory()
    {
        $userID = session('userid');

        $historys = historyModel::where('userID',$userID)->get();

        $data = compact('historys');
        return view('User.viewHistory')->with($data);
    }

    public function cancelTicket()
    {
        return view("User.cancelTicket");
    }

    public function ticketCancel(Request $r)
    {
        $cancel = bookingModel::where('ticketID',$r['ticketID'])->first();
        if($cancel)
        {
            $curDate = now()->format('Y-m-d');
            // $curTime = now()->format('H:m:s');
            $ticket = bookingModel::where('ticketID',$r['ticketID'])->where('date','>',$curDate)->first();
            if($ticket)
            {
                bookingModel::find($r['ticketID'])->delete();
                
                $message = "DoneTicket";
                return $message;
            }
            else
            {
                $message = "lateTime";
                return $message;
            }
        }
        else
        {
            $message = "notTicket";
            return $message;
        }
    }
}
