<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\busModel;
use DB;

class adminController extends Controller
{
    public function adminHome()
    {
        return view("Admin.adminHome");
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
}
