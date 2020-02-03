<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UserAccess;
use App\UserRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserRoleController extends Controller
{
    public function index(){
        $table = UserRules::orderBy('id', 'DESC')->get();
        return view('users.role')->with(['table' => $table]);
    }

    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2|unique:user_rules,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        $table = new UserRules();
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2|unique:user_rules,name,'.$id.',id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        $table = UserRules::find($id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function del($id){
        $table = UserRules::destroy($id);
        return redirect()->back()->with('save', true);
    }

    public function show($id){
        $table = UserRules::find($id);

        $getRouteCollection = Route::getRoutes();
        $permissions = [];
        foreach ($getRouteCollection as $route) {
            $access = $route->getName();
            if(Str::contains($access, 'front.') == false && $access != null && $access != 'login' && $access != 'logout' && $access != 'register' && $access != 'password.request' && $access != 'password.email' && $access != 'password.reset' && $access != 'password.update' && $access != 'password.confirm')

                $permissions[] = ['access' => $access, 'name' => name_gen($access)];
        }

        return view('users.action.permission')->with(['table' => $table, 'permissions' => $permissions]);
    }

    public function permission(Request $request){

        $validator = Validator::make($request->all(), [
            'userRuleID' => 'required|numeric',
            //'access' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        $access = $request->access;

        UserAccess::where('userRuleID', $request->userRuleID)->delete();

        if($access != null){
            foreach ($access as $row){
                $table = new UserAccess();
                $table->userRuleID = $request->userRuleID;
                $table->name = name_gen($row);
                $table->access = $row;
                $table->save();
            }
        }

        return redirect()->back()->with('save', true);

       // dd($request->all());
    }

}
