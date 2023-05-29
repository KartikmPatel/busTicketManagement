<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use App\Models\stationModel;
use App\Models\routeModel;
use App\Models\seatModel;
use App\Models\staffModel;
use App\Models\bookingModel;
use App\Models\cancelticketModel;
use App\Models\userModel;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function adminHome()
    {
        $userid = session('userid');
        if($userid)
        {
            $user = userModel::find($userid);
            session()->put('userImage',$user->image);
        }
        $busCount = busModel::count();
        $routeCount = routeModel::count();
        $stationCount = stationModel::count();
        $bookingCount = bookingModel::count();
        $staffCount = staffModel::count();
        $data = compact('busCount','routeCount','stationCount','bookingCount','staffCount');
        return view("Admin.adminHome")->with($data);
    }

    public function manageTodayBooking(Request $r)
    {
        $curDate = now()->format('Y-m-d');
        $search = $r['search'] ?? "";
        if($search != "")
        {
            // $bus = busModel::where('busNo','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->orWhere('size','LIKE',"%$search%")->orWhere('type','LIKE',"%$search%")->paginate(5);
            $todayData = bookingModel::select('*')->where('date',$curDate)->where('busNo','LIKE',"%$search%")->orderBy('busNo')->paginate(5);
            $todayData->appends(['search' => $search]);
        }
        else
        {
            // $bus = busModel::paginate(5);
            $todayData = bookingModel::select('*')->where('date',$curDate)->orderBy('busNo')->paginate(5);
        }

        $users = userModel::all();
        $data = compact('todayData','users','search');
        return view('Admin.managetodayRecord')->with($data);
    }

    public function viewBuses(Request $r)
    {
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $bus = busModel::where('busNo','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->orWhere('size','LIKE',"%$search%")->orWhere('type','LIKE',"%$search%")->paginate(5);
            $bus->appends(['search' => $search]);
        }
        else
        {
            $bus = busModel::paginate(5);
        }

        $url = url('/manageBus');
        $title = "Add Bus";
        $data = compact('bus','title','url','search');
        return view("Admin.manageBus")->with($data);
    }

    public function addBus(Request $r)
    {
        // $r->validate([
        //     'busno' => 'required',
        //     'name' => 'required',
        //     'size' => 'required'
        // ],
        // [
        //     'busno.required' => 'Please enter BusNo',
        //     'name.required' => 'Please enter Name',
        //     'size.required' => 'Please enter Size'
        //     ]
        // );

        $busNo = $r['busno'];

        $bus = busModel::where('busNo',$r['busno'])->first();
        if($bus)
        {
            $message = "busError";
            return $message;
        }
        else
        {
            $bus = new busModel;
            $bus->busNo = $r['busno'];
            $bus->name = $r['name'];
            if($r['type'] == "Seater")
            {
                $bus->size = 30;
            }
            else if($r['type'] == "Sleeper")
            {
                $bus->size = 20;
            }
            $bus->type = $r['type'];
            $bus->save();
            DB::insert("CALL insert_bus('".$busNo."')");

        }
        //   $value = [$busNo];

        $message = "busSuccess";
        return $message;
        // return redirect()->back();
    }

    public function deleteBus($id)
    {
        busModel::find($id)->delete();

        DB::insert("CALL delete_bus('".$id."')");
        $message = "deleteBus";
        // return $message;
        return redirect()->back();
    }

    // public function editBus($id)
    // {
    //     $bus = busModel::find($id);

    //     $title = "Update Bus";
    //     $url = url('update/').$id;
    //     $data = compact('bus','url','title');

    //     return view('Admin.manageBus')->with($data);
    // }

    public function updateBus(Request $r)
    {
        $bus = busModel::find($r['busno']);

        $bus->name = $r['name'];
        // $bus->size = $r['size'];
        if($r['type'] == "Seater")
        {
            $bus->size = 30;
        }
        else if($r['type'] == "Sleeper")
        {
            $bus->size = 20;
        }
        $bus->type = $r['type'];
        $bus->save();

        $message = "updateBus";
        return $message;
    }

    public function viewRoutes(Request $r)
    {
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $routes = routeModel::where('busNo','LIKE',"%$search%")->orWhere('routeID','LIKE',"%$search%")->orWhere('startingStationID','LIKE',"%$search%")->orWhere('endingStationID','LIKE',"%$search%")->orWhere('departureTime','LIKE',"%$search%")->orWhere('fare','LIKE',"%$search%")->paginate(5);
            $routes->appends(['search' => $search]);
        }
        else
        {
            $routes = routeModel::paginate(5);
        }

        $buses = busModel::all();
        $stations = stationModel::all();
        $data = compact('buses','stations','routes','search');
        return view("Admin.manageRoute")->with($data);
    }

    public function addRoute(Request $r)
    {
        $r->validate([
            'busno' => 'required',
            'startStation' => 'required',
            'endStation' => 'required',
            'dtime' => 'required',
            'fare' => 'required'
        ],
        [
            'busno.required' => 'Please Select BusNo',
            'startStation.required' => 'Please Select Starting Station',
            'endStation.required' => 'Please Select Ending Station',
            'dtime.required' => 'Please Select Departure Time',
            'fare.required' => 'Please Enter Fare'
        ]
    );

    $bus = routeModel::where('busNo',$r['busno'])->first();

    if($bus)
    {
        $message = "busError";
        return $message;
    }
    else if($r['startStation'] == $r['endStation'])
    {
        $message = "stationError";
        return $message;
    }
    else
    {
        $route = new routeModel;
        $route->busNo = $r['busno'];
        $route->startingStationID = $r['startStation'];
        $route->endingStationID = $r['endStation'];
        $route->departureTime = $r['dtime'];
        $route->fare = $r['fare'];
        $route->save();
        $message = "routeDone";
        return $message;
    }
    // return redirect()->back();
    }

    public function deleteRoute($id)
    {
        routeModel::find($id)->delete();
        return redirect()->back();
    }

    public function updateRoute(Request $r)
    {
        $route = routeModel::find($r['rID']);
        $st1 = stationModel::where('stationName',$r['ssID'])->first();
        $st2 = stationModel::where('stationName',$r['esID'])->first();

        $route->busNo = $r['busno'];
        $route->startingStationID = $st1->stationID;
        $route->endingStationID = $st2->stationID;
        $route->departureTime = $r['dtime'];
        $route->fare = $r['fare'];
        $route->save();

        $message = "updateRoute";
        return $message;
    }

    public function viewStaff(Request $r)
    {
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $staff = staffModel::where('busNo','LIKE',"%$search%")->orWhere('staffID','LIKE',"%$search%")->orWhere('staffName','LIKE',"%$search%")->orWhere('staffType','LIKE',"%$search%")->orWhere('mobileNo','LIKE',"%$search%")->paginate(5);
            $staff->appends(['search' => $search]);
        }
        else
        {
            $staff = staffModel::paginate(5);
        }
        
        $buses = busModel::all();
        $data = compact('staff','buses','search');
        return view("Admin.manageStaff")->with($data);
    }

    public function addStaff(Request $r)
    {
        $r->validate([
            'busno' => 'required',
            'sName' => 'required',
            'sType' => 'required',
            'mNo' => 'required'
        ],
        [
            'busno.required' => 'Please Select BusNo',
            'sName.required' => 'Please Enter Staff Name',
            'sType.required' => 'Please Select Staff Type',
            'mNo.required' => 'Please Enter Mobile Number'
        ]
    );

    $busStaff = staffModel::where('busNo',$r['busno'])->get();
    foreach($busStaff as $b)
    {
        if(($b->staffType == $r['sType']))
        {
            $message = "errorStaff";
            return $message;
        //    return redirect()->back();
        }
    }

       $staff = new staffModel;
       $staff->busNo = $r['busno'];
       $staff->staffName = $r['sName'];
       $staff->staffType = $r['sType'];
       $staff->mobileNo = $r['mNo'];
       $staff->save();

       $message = "insertStaff";
        return $message;
    //    return redirect()->back();
    }

    public function deleteStaff($id)
    {
       staffModel::find($id)->delete();
       return redirect()->back();
    }

    public function updateStaff(Request $r)
    {
        $staff = staffModel::find($r['sID']);

        $staff->busNo = $r['busno'];
        $staff->staffName = $r['sName'];
        $staff->staffType = $r['sType'];
        $staff->mobileNo = $r['mNo'];
        $staff->save();

        $message = "updateStaff";
        return $message;
    }

    public function viewStations(Request $r)
    {
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $station = stationModel::where('stationID','LIKE',"%$search%")->orWhere('stationName','LIKE',"%$search%")->paginate(5);
            $station->appends(['search' => $search]);
        }
        else
        {
            $station = stationModel::paginate(5);
        }

        $url = url('/manageStation');
        $title = "Add Station";
        $data = compact('station','title','url','search');
        return view("Admin.manageStation")->with($data);
    }

    public function addStation(Request $r)
    {
        $r->validate([
            'staid' => 'required',
            'staname' => 'required',
        ],
        [
            'staid.required' => 'Please enter Station Id',
            'staname.required' => 'Please enter Station Name',
        ]
    );

        $station = stationModel::where('stationName',$r['staname'])->first();
        if($station)
        {
            $message = "stationError";
            return $message;
        }
        else
        {
            $station = new stationModel;
            $station->stationID = $r['staid'];
            $station->stationName = $r['staname'];
            $station->save();

            $message = "insertStation";
            return $message;
        }
    }

    public function updateStation(Request $r)
    {
        $station = stationModel::find($r['staid']);
        $station->stationName = $r['staname'];
        $station->save();

        $message = "updateStation";
        return $message;
    }

    public function deleteStation($id)
    {
        stationModel::find($id)->delete();
        return redirect()->back();
    }

    public function adminSeats()
    {
        $buses = busModel::all();
        $data = compact('buses');
        return view('Admin.adminSeats')->with($data);
    }

    public function searchSeats(Request $r)
    {
        // $busSeats = seatModel::where('busNo',$r['busno'])->get();
        $date = $r['date'];
        $busSeats = DB::select('select * from '.$r["busno"].'seatTB where date="'.$date.'"');
        $bus = busModel::find($r['busno']);
        $data = compact('busSeats','bus');
        return view('Admin.searchSeat')->with($data);
    }

    public function manageBooking(Request $r)
    {
        $users = userModel::all();
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $tickets = bookingModel::where('busNo','LIKE',"%$search%")->orWhere('ticketID','LIKE',"%$search%")->orWhere('userID','LIKE',"%$search%")->orWhere('seatNo','LIKE',"%$search%")->orWhere('fare','LIKE',"%$search%")->orWhere('from','LIKE',"%$search%")->orWhere('to','LIKE',"%$search%")->orWhere('date','LIKE',"%$search%")->orWhere('time','LIKE',"%$search%")->paginate(5);
            $tickets->appends(['search' => $search]);
        }
        else
        {
            $tickets = bookingModel::paginate(5);
        }
        $data = compact('tickets','search','users');
        return view('Admin.manageBooking')->with($data);
    }

    public function manageCancelTicket(Request $r)
    {
        $users = userModel::all();
        $search = $r['search'] ?? "";
        if($search != "")
        {
            $ticket = cancelticketModel::where('busNo','LIKE',"%$search%")->orWhere('cancelID','LIKE',"%$search%")->orWhere('userID','LIKE',"%$search%")->orWhere('seatNo','LIKE',"%$search%")->orWhere('fare','LIKE',"%$search%")->orWhere('Source','LIKE',"%$search%")->orWhere('Destination','LIKE',"%$search%")->orWhere('Status','LIKE',"%$search%")->orWhere('busDate','LIKE',"%$search%")->orWhere('busTime','LIKE',"%$search%")->paginate(5);
            $ticket->appends(['search' => $search]);
        }
        else
        {
            $ticket = cancelticketModel::paginate(5);
        }
        $data = compact('ticket','search','users');
        return view('Admin.managecancelTicket')->with($data);
    }
}
