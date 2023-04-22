<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use App\Models\stationModal;
use App\Models\routeModal;
use App\Models\staffModel;

class adminController extends Controller
{
    public function adminHome()
    {
        $busCount = busModel::count();
        $routeCount = routeModal::count();
        $data = compact('busCount','routeCount');
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

        $bus = new busModel;
        $bus->busNo = $r['busno'];
        $bus->name = $r['name'];
        $bus->size = $r['size'];
        $bus->type = $r['type'];
        $bus->save();

        return redirect()->back();
    }

    public function deleteBus($id)
    {
        busModel::find($id)->delete();
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
        $stations = stationModal::all();
        $routes = routeModal::all();
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

     $busRoute = routeModal::where('busNo',$r['busno'])->get();

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
        $route = new routeModal;
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
        routeModal::find($id)->delete();
        return redirect()->back();
    }

    public function updateRoute(Request $r)
    {
        $route = routeModal::find($r['rID']);
        $st1 = stationModal::where('stationName',$r['ssID'])->first();
        $st2 = stationModal::where('stationName',$r['esID'])->first();

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
}
