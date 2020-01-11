<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeSlotController extends Controller
{
    public function index(){
        $table = TimeSlot::orderBy('id', 'DESC')->get();
        return view('settings.time-slot')->with(['table' => $table]);
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'fromTime' => 'required|max:8|min:8',
            'toTime' => 'required|max:8|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = new TimeSlot();
        $table->name = $request->name;
        $table->fromTime = $request->fromTime;
        $table->toTime = $request->toTime;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'fromTime' => 'required|max:8|min:8',
            'toTime' => 'required|max:8|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = TimeSlot::find($id);
        $table->name = $request->name;
        $table->fromTime = $request->fromTime;
        $table->toTime = $request->toTime;
        $table->save();

        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = TimeSlot::destroy($id);
        return redirect()->back()->with('del', true);
    }
}
