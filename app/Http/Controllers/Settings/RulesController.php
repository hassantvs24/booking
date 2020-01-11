<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RulesController extends Controller
{
    public function index(){
        $table = Rules::orderBy('id', 'DESC')->get();
        return view('settings.rules')->with(['table' => $table]);
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'rulesFor' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = new Rules();
        $table->name = $request->name;
        $table->rulesFor = $request->rulesFor;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'rulesFor' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = Rules::find($id);
        $table->name = $request->name;
        $table->rulesFor = $request->rulesFor;
        $table->save();
        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = Rules::destroy($id);
        return redirect()->back()->with('del', true);
    }
}
