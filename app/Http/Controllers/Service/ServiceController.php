<?php

namespace App\Http\Controllers\Service;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Location;
use App\Rules;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(){
        $table = Services::orderBy('id', 'DESC')->get();
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();
        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        return view('service.service')->with(['table' => $table, 'location' => $location, 'facility' => $facility, 'rules' => $rules]);
    }

    public function go_save(){
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();
        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        return view('service.action.save')->with(['location' => $location, 'facility' => $facility, 'rules' => $rules]);
    }

    public function go_edit($id){
        $table = Services::find($id);
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();
        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        return view('service.action.edit')->with(['table' => $table, 'location' => $location, 'facility' => $facility, 'rules' => $rules]);
    }

    public function save(Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'mobile' => 'required|max:11|min:11',
            'email' => 'nullable|email',
            'locationID' => 'required|numeric',
            'primaryPhoto' => 'required|file',
            'minGuest' => 'required|numeric',
            'maxGuest' => 'required|numeric',
            'serviceType' => 'required',
            'gallery.*' => 'file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }

        /*try{
            DB::beginTransaction();*/

            $packages = $request->package ?? [];
            $price = $request->price ?? [];

            $photoName = $request->photoName ?? [];

            $socialNames = $request->socialName ?? [];
            $socialLink = $request->socialLink ?? [];

            $location = Location::find($request->locationID);

            $contact = collect([
                'mobile' => $request->mobile ?? 0,
                'phone' => $request->phone ?? 0,
                'whatsApp' => $request->WhatsApp ?? 0,
                'viber' => $request->Viber ?? 0
            ]);

            $dbContact = $contact->toJson();//($contact->count() > 0 ? $contact->toJson() : [] );


            $facility = collect($request->facility);
            $dbFacility = $facility->toJson();//($facility->count() > 0 ? $facility->toJson() : [] );
            $rules = collect($request->rules);
            $dbRules = $rules->toJson();//($rules->count() > 0 ? $rules->toJson() : [] );


            $priceDatas = [];
            $priceData = [];
            foreach ($packages as $i => $package){
                $priceData['name'] = $package;
                $priceData['price'] = $price[$i];

                $priceDatas[] = $priceData;
            }
            $pricing = collect($priceDatas);

            $dbPrice = $pricing->toJson();//$pricing->toJson(); ($pricing->count() > 0 ? $pricing->toJson() : [] );

            $socialDatas = [];
            $socialData = [];
            foreach ($socialNames as $j => $socialName){
                $socialData['name'] = $socialName;
                $socialData['link'] = $socialLink[$j];
                $socialDatas[] = $socialData;
            }
            $social = collect($socialDatas);

            $dbSocial = $social->toJson();//($social->count() > 0 ? $social->toJson() : $social->toJson([]) );

            $photoDatas = [];
            $photoData = [];

            if($request->hasFile('primaryPhoto')){
                $photoData['name'] = 'Profile Photo';

                $extension = $request->file('primaryPhoto')->extension();

                //############ 512x512 ###########
                $fileName = 'profile_'.md5(date('d-m-y H:i:s')).'.'.$extension;
                $photo = Image::make($request->file('primaryPhoto'));
                $photo->resize(512, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo->resizeCanvas(512, 512, 'center', false, 'rgba(255, 255, 255, 0)');
                $photo_main = $photo->stream($extension);

                Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                //############ 512x512 ###########

                $photoData['photo'] = $fileName;

                $photoDatas[] = $photoData;
            }

            if($request->hasfile('gallery'))
            {
                foreach($request->file('gallery') as $k => $file)
                {
                    $extension = $file->extension();
                    //############ 512x512 ###########
                    $fileName = 'gallery_'.$k.md5(date('d-m-y H:i:s')).'.'.$extension;
                    $photo = Image::make($file);
                    $photo->resize(512, 512, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $photo->resizeCanvas(512, 512, 'center', false, 'rgba(255, 255, 255, 0)');
                    $photo_main = $photo->stream($extension);

                    Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                    //############ 512x512 ###########

                    $photoData['name'] = $photoName[$k];
                    $photoData['photo'] = $fileName;

                    $photoDatas[] = $photoData;
                }
            }
            $photos = collect($photoDatas);
            $dbPhotos = $photos->toJson();//($photos->count() > 0 ? $photos->toJson() : [] );


            $table = new Services();
            $table->serviceType = $request->serviceType;
            $table->name = $request->name;
            $table->email = $request->email;
            $table->locationID = $request->locationID;
            $table->lat = $location->lat ?? 0;
            $table->lon = $location->lon ?? 0;
            $table->address = $request->address;
            $table->landmark = $request->landmark;
            $table->minGuest = $request->minGuest;
            $table->maxGuest = $request->maxGuest;
            $table->website = $request->website;
            $table->contact = $dbContact;
            $table->pricing = $dbPrice;
            $table->facility = $dbFacility;
            $table->rules = $dbRules;
            $table->social = $dbSocial;
            $table->photos = $dbPhotos;
            $table->description = $request->description;
            $table->save();

            /*DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }*/

        return redirect()->back()->with('save', true);
    }


    public function edit($id, Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'mobile' => 'required|max:11|min:11',
            'email' => 'nullable|email',
            'locationID' => 'required|numeric',
            'primaryPhoto' => 'file',
            'minGuest' => 'required|numeric',
            'maxGuest' => 'required|numeric',
            'serviceType' => 'required',
            'gallery.*' => 'file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }


        /*try{
    DB::beginTransaction();*/

        $table = Services::find($id);
        $photoDatas = json_decode($table->photos, true);


        $packages = $request->package ?? [];
        $price = $request->price ?? [];

        $photoName = $request->photoName ?? [];

        $socialNames = $request->socialName ?? [];
        $socialLink = $request->socialLink ?? [];

        $location = Location::find($request->locationID);

        $contact = collect([
            'mobile' => $request->mobile ?? 0,
            'phone' => $request->phone ?? 0,
            'whatsApp' => $request->WhatsApp ?? 0,
            'viber' => $request->Viber ?? 0
        ]);

        $dbContact = $contact->toJson();//($contact->count() > 0 ? $contact->toJson() : [] );


        $facility = collect($request->facility);
        $dbFacility = $facility->toJson();//($facility->count() > 0 ? $facility->toJson() : [] );
        $rules = collect($request->rules);
        $dbRules = $rules->toJson();//($rules->count() > 0 ? $rules->toJson() : [] );


        $priceDatas = [];
        $priceData = [];
        foreach ($packages as $i => $package){
            $priceData['name'] = $package;
            $priceData['price'] = $price[$i];

            $priceDatas[] = $priceData;
        }
        $pricing = collect($priceDatas);

        $dbPrice = $pricing->toJson();//$pricing->toJson(); ($pricing->count() > 0 ? $pricing->toJson() : [] );

        $socialDatas = [];
        $socialData = [];
        foreach ($socialNames as $j => $socialName){
            $socialData['name'] = $socialName;
            $socialData['link'] = $socialLink[$j];
            $socialDatas[] = $socialData;
        }
        $social = collect($socialDatas);

        $dbSocial = $social->toJson();//($social->count() > 0 ? $social->toJson() : $social->toJson([]) );


        $photoData = [];

        if($request->hasFile('primaryPhoto')){

            $img = Arr::get($photoDatas, '0.photo');
            $exists = Storage::disk('gallery')->exists($img);
            if($exists){
                Storage::disk('gallery')->delete($img);
            }

            $photoData['name'] = 'Profile Photo';

            $extension = $request->file('primaryPhoto')->extension();

            //############ 512x512 ###########
            $fileName = 'profile_'.md5(date('d-m-y H:i:s')).'.'.$extension;
            $photo = Image::make($request->file('primaryPhoto'));
            $photo->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            });
            $photo->resizeCanvas(512, 512, 'center', false, 'rgba(255, 255, 255, 0)');
            $photo_main = $photo->stream($extension);

            Storage::disk('gallery')->put($fileName, $photo_main->__toString());
            //############ 512x512 ###########


            Arr::set($photoDatas, '0.photo', $fileName);

        }

        if($request->hasfile('gallery'))
        {
            foreach($request->file('gallery') as $k => $file)
            {
                $extension = $file->extension();
                //############ 512x512 ###########
                $fileName = 'gallery_'.$k.md5(date('d-m-y H:i:s')).'.'.$extension;
                $photo = Image::make($file);
                $photo->resize(512, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo->resizeCanvas(512, 512, 'center', false, 'rgba(255, 255, 255, 0)');
                $photo_main = $photo->stream($extension);

                Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                //############ 512x512 ###########

                $photoData['name'] = $photoName[$k];
                $photoData['photo'] = $fileName;

                $photoDatas[] = $photoData;
            }
        }


        $photos = collect($photoDatas);
        $dbPhotos = $photos->toJson();//($photos->count() > 0 ? $photos->toJson() : [] );

        $table->serviceType = $request->serviceType;
        $table->name = $request->name;
        $table->email = $request->email;
        $table->locationID = $request->locationID;
        $table->lat = $location->lat ?? 0;
        $table->lon = $location->lon ?? 0;
        $table->address = $request->address;
        $table->landmark = $request->landmark;
        $table->minGuest = $request->minGuest;
        $table->maxGuest = $request->maxGuest;
        $table->website = $request->website;
        $table->contact = $dbContact;
        $table->pricing = $dbPrice;
        $table->facility = $dbFacility;
        $table->rules = $dbRules;
        $table->social = $dbSocial;
        $table->photos = $dbPhotos;
        $table->description = $request->description;
        $table->save();

        /*DB::commit();
    }catch(\Exception $e){
        DB::rollback();
    }*/

        return redirect()->back()->with('edit', true);
    }

    public function del($id){
        $table = Services::find($id);
        $photos = json_decode($table->photos, true);

        foreach ($photos as $key => $photo){
            $img = Arr::get($photos, $key.'.photo');
            $exists = Storage::disk('gallery')->exists($img);
            if($exists){
                Storage::disk('gallery')->delete($img);
            }
        }

        $table->delete();

        return redirect()->back()->with('del', true);
    }


    public function del_photo($id, $key){

        $table = Services::find($id);
        $photos = json_decode($table->photos, true);
        $img = Arr::get($photos, $key.'.photo');

        $exists = Storage::disk('gallery')->exists($img);
        if($exists){
            Storage::disk('gallery')->delete($img);
        }

        Arr::forget($photos, $key);
        $dbPhotos = collect($photos)->toJson();

        $table->photos = $dbPhotos;
        $table->save();

        return redirect()->back()->with('del', true);
    }

}
