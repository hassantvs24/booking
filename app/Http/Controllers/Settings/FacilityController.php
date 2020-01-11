<?php

namespace App\Http\Controllers\Settings;

use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class FacilityController extends Controller
{
    public function index(){
        $table = Facility::orderBy('id', 'DESC')->get();
        return view('settings.facility')->with(['table' => $table]);
    }

    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'icon' => 'file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        $table = new Facility();
        $table->name = $request->name;

        if($request->hasFile('icon')){

            //############ 128x128 ###########
            $fileName = 'facility_'.md5(date('d-m-y H:i:s')).'.png';
            $photo = Image::make($request->file('icon'));
            $photo->resize(128, 128, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->resizeCanvas(128, 128, 'center', false, 'rgba(255, 255, 255, 0)');
            $photo_main = $photo->stream('png');

            Storage::disk('facility')->put($fileName, $photo_main->__toString());
            //############ 128x128 ###########

            $table->icon = $fileName;
        }

        $table->save();

        return redirect()->back()->with('save', true);
    }

    public function edit($id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'icon' => 'file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }


        $table = Facility::find($id);
        $table->name = $request->name;

        if($request->hasFile('icon')){

            $img = $table->icon;
            $exists = Storage::disk('facility')->exists($img);
            if($exists){
                Storage::disk('facility')->delete($img);
            }

            //############ 128x128 ###########
            $fileName = 'facility_'.md5(date('d-m-y H:i:s')).'.png';
            $photo = Image::make($request->file('icon'));
            $photo->resize(128, 128, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->resizeCanvas(128, 128, 'center', false, 'rgba(255, 255, 255, 0)');
            $photo_main = $photo->stream('png');

            Storage::disk('facility')->put($fileName, $photo_main->__toString());
            //############ 128x128 ###########

            $table->icon = $fileName;
        }

        $table->save();

        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = Facility::find($id);

        $img = $table->icon;
        $exists = Storage::disk('facility')->exists($img);
        if($exists){
            Storage::disk('facility')->delete($img);
        }
        $table->delete();

        return redirect()->back()->with('del', true);
    }
}
