<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use App\Models\stationModel;
use App\Models\routeModel;
use App\Models\staffModel;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function adminHome()
    {
        $busCount = busModel::count();
        $routeCount = routeModel::count();
        $stationCount = stationModel::count();
        $data = compact('busCount','routeCount','stationCount');
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
        $r->validate([
            'busno' => 'required',
            'name' => 'required',
            'size' => 'required'
        ],
        [
            'busno.required' => 'Please enter BusNo',
            'name.required' => 'Please enter Name',
            'size.required' => 'Please enter Size'
            ]
        );

        $busNo = $r['busno'];
        if($busNo)
        {
            $bus = new busModel;
            $bus->busNo = $r['busno'];
            $bus->name = $r['name'];
            $bus->size = $r['size'];
            $bus->type = $r['type'];
            $bus->save();
        }

        //   $value = [$busNo];
        DB::insert("CALL insert_bus('".$busNo."')");

        return redirect()->back();
    }

    public function deleteBus($id)
    {
        busModel::find($id)->delete();

        DB::insert("CALL delete_bus('".$id."')");
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
        $bus->size = $r['size'];
        $bus->type = $r['type'];
        $bus->save();
    }

    public function viewRoutes()
    {
        $buses = busModel::all();
        $stations = stationModel::all();
        $routes = routeModel::all();
        $error = "Date Must Be Different";

        $data = compact('buses','stations','routes','error');
        return view("Admin.manageRoute")->with($data);
    }

    public function addRoute(Request $r)
    {
        $r->validate([
            'busno' => 'required',
            'startStation' => 'required',
            'endStation' => 'required',
            'date' => 'required',
            'dtime' => 'required',
            'fare' => 'required'
        ],
        [
            'busno.required' => 'Please Select BusNo',
            'startStation.required' => 'Please Select Starting Station',
            'endStation.required' => 'Please Select Ending Station',
            'date.required' => 'Please Select Date',
            'dtime.required' => 'Please Select Departure Time',
            'fare.required' => 'Please Enter Fare'
        ]
    );

     $busRoute = routeModel::where('busNo',$r['busno'])->get();

     foreach($busRoute as $br)
     {
         if($br->date == $r['date'])
         {
             return back()->with('success','sfsgsbsf');
        }
    }

    if($r['startStation'] == $r['endStation'])
    {
        return redirect()->back();
    }
    else
    {
        $route = new routeModel;
        $route->busNo = $r['busno'];
        $route->startingStationID = $r['startStation'];
        $route->endingStationID = $r['endStation'];
        $route->date = $r['date'];
        $route->departureTime = $r['dtime'];
        $route->fare = $r['fare'];
        $route->save();
    }
    return redirect()->back();
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
        $route->date = $r['ddate'];
        $route->departureTime = $r['dtime'];
        $route->fare = $r['fare'];
        $route->save();
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
           return redirect()->back();
        }
    }

       $staff = new staffModel;
       $staff->busNo = $r['busno'];
       $staff->staffName = $r['sName'];
       $staff->staffType = $r['sType'];
       $staff->mobileNo = $r['mNo'];
       $staff->save();

       return redirect()->back();
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

        $station = new stationModel;
        $station->stationID = $r['staid'];
        $station->stationName = $r['staname'];
        $station->save();

        return redirect()->back();
    }

    public function updateStation(Request $r)
    {
        $station = stationModel::find($r['staid']);
        $station->stationName = $r['staname'];
        $station->save();
    }

    public function deleteStation($id)
    {
        stationModel::find($id)->delete();
        return redirect()->back();
    }
}
