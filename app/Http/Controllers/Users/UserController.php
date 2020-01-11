<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use App\UserRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $table = User::orderBy('id', 'DESC')->get();
        $roles = UserRules::orderBy('name', 'ASC')->get();
        return view('users.user')->with(['table' => $table, 'roles' => $roles]);
    }

    public function save(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'userType' => 'required|max:20',
            'contact' => 'required|max:11|min:11|unique:users,contact',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|max:191|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        $table = new User();
        $table->userType = $request->userType;
        $table->userRuleID = $request->userRuleID;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->password = bcrypt($request->password);
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'userType' => 'required|max:20',
            'contact' => 'required|max:11|min:11|unique:users,contact,'.$id.',id',
            'email' => 'required|email|max:191|unique:users,email,'.$id.',id',
            'password' => 'required|max:191|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        $table = User::find($id);
        $table->userType = $request->userType;
        $table->userRuleID = $request->userRuleID;
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->password = bcrypt($request->password);
        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function del($id){
        $table = User::destroy($id);
        return redirect()->back()->with('del', true);
    }

}
