<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use App\Models\stationModel;
use App\Models\routeModel;
use App\Models\seatModel;
use App\Models\staffModel;
use App\Models\bookingModel;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function adminHome()
    {
        $busCount = busModel::count();
        $routeCount = routeModel::count();
        $stationCount = stationModel::count();
        $bookingCount = bookingModel::count();
        $data = compact('busCount','routeCount','stationCount','bookingCount');
        return view("Admin.adminHome")->with($data);
    }

    public function viewBuses()
    {
        $bus = busModel::all();
        $url = url('/manageBus');
        $title = "Add Bus";
        $data = compact('bus','title','url');
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
                $bus->size = 24;
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
            $bus->size = 24;
        }
        $bus->type = $r['type'];
        $bus->save();

        $message = "updateBus";
        return $message;
    }

    public function viewRoutes()
    {
        $buses = busModel::all();
        $stations = stationModel::all();
        $routes = routeModel::all();

        $data = compact('buses','stations','routes');
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

    public function viewStaff()
    {
        $staff = staffModel::all();
        $buses = busModel::all();
        $data = compact('staff','buses');
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

    public function viewStations()
    {
        $station = stationModel::all();
        $url = url('/manageStation');
        $title = "Add Station";
        $data = compact('station','title','url');
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

    public function manageBooking()
    {
        $tickets = bookingModel::all();
        $data = compact('tickets');
        return view('Admin.manageBooking')->with($data);
    }
}
