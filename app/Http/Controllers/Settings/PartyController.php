<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
    public function index(){
        $table = Party::orderBy('id', 'DESC')->get();
        return view('settings.party')->with(['table' => $table]);
    }

    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = new Party();
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = Party::find($id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = Party::destroy($id);
        return redirect()->back()->with('del', true);
    }
}
