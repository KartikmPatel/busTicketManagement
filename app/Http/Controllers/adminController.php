<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use App\Models\stationModal;
use App\Models\routeModal;

class adminController extends Controller
{
    public function adminHome()
    {
        $busCount = busModel::count();
        $data = compact('busCount');
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

        $data = compact('buses','stations','routes');
        return view("Admin.manageRoute")->with($data);
    }

    public function addRoute(Request $r)
    {
        $r->validate([
            'busno' => 'required',
            'startStation' => 'required',
            'endStation' => 'required',
            'fare' => 'required'
        ],
        [
            'busno.required' => 'Please Select BusNo',
            'startStation.required' => 'Please Select Starting Station',
            'endStation.required' => 'Please Select Ending Station',
            'fare.required' => 'Please Enter Fare'
        ]
    );

       $route = new routeModal;
       $route->busNo = $r['busno'];
       $route->startingStationID = $r['startStation'];
       $route->endingStationID = $r['endStation'];
       $route->fare = $r['fare'];
       $route->save();

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

        $route->busNo = $r['busno'];
        $route->startingStationID = $r['ssID'];
        $route->endingStationID = $r['esID'];
        $route->fare = $r['fare'];
        $route->save();
    }
}
