<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index(){
        $table = Location::orderBy('id', 'DESC')->get();
        $city = Location::select('city')->orderBy('city', 'ASC')->where('city', '<>', null)->groupBy('city')->get();
        return view('settings.location')->with(['table' => $table, 'city' => $city]);
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'city' => 'required|max:100|min:2',
            'name' => 'required|max:100|min:2',
            'lat' => 'numeric',
            'lon' => 'numeric',
            'address' => 'max:191',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = new Location();
        $table->city = $request->city;
        $table->name = $request->name;
        $table->lat = $request->lat;
        $table->lon = $request->lon;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'city' => 'required|max:100|min:2',
            'name' => 'required|max:100|min:2',
            'lat' => 'numeric',
            'lon' => 'numeric',
            'address' => 'max:191',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = Location::find($id);
        $table->city = $request->city;
        $table->name = $request->name;
        $table->lat = $request->lat;
        $table->lon = $request->lon;
        $table->address = $request->address;
        $table->save();

        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = Location::destroy($id);
        return redirect()->back()->with('del', true);
    }
}
