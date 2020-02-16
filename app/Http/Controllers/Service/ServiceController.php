<?php

namespace App\Http\Controllers\Service;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Location;
use App\Party;
use App\Rules;
use App\Services;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(){
        $tables = Services::orderBy('id', 'DESC');
        if(Auth::user()->userType == 'Vendor'){
            $tables->where('vendorID', Auth::user()->id);
        }
        $table =  $tables->get();
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();

        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        return view('service.service')->with(['table' => $table, 'location' => $location, 'facility' => $facility, 'rules' => $rules]);
    }

    public function go_save(){
        $vendor = User::orderBy('name', 'ASC')->where('userType', 'Vendor')->get();
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();
        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        $partyType = Party::orderBy('name', 'ASC')->get();
        $city = Location::select('city')->orderBy('city', 'ASC')->where('city', '<>', null)->groupBy('city')->get();
        return view('service.action.save')->with(['vendor' => $vendor, 'city' => $city, 'location' => $location, 'facility' => $facility, 'rules' => $rules, 'partyTypes' => $partyType]);
    }

    public function go_edit($id){
        $table = Services::find($id);
        $vendor = User::orderBy('name', 'ASC')->where('userType', 'Vendor')->get();
        $location = Location::orderBy('name', 'ASC')->get();
        $facility = Facility::orderBy('name', 'ASC')->get();
        $rules = Rules::orderBy('rulesFor', 'ASC')->orderBy('name', 'ASC')->get();
        $partyType = Party::orderBy('name', 'ASC')->get();
        $city = Location::select('city')->orderBy('city', 'ASC')->where('city', '<>', null)->groupBy('city')->get();
        return view('service.action.edit')->with(['table' => $table, 'city' => $city, 'vendor' => $vendor, 'location' => $location, 'facility' => $facility, 'rules' => $rules, 'partyTypes' => $partyType]);
    }

    public function save(Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'additional' => 'max:255',
            'mobile' => 'required|max:11|min:11',
            'email' => 'nullable|email',
            'locationID' => 'required|numeric',
            'vendorID' => 'required|numeric',
            'primaryPhoto' => 'required|file',
            'minGuest' => 'required|numeric',
            'maxGuest' => 'required|numeric',
            'serviceType' => 'required',
            'gallery.*' => 'file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }


        DB::beginTransaction();
        try {

            $packages = $request->package ?? [];
            $price = $request->price ?? [];
            $items = $request->items ?? [];

            $questions = $request->question ?? [];
            $answers = $request->answer ?? [];


            $photoName = $request->photoName ?? [];

            $socialNames = $request->socialName ?? [];
            $socialLink = $request->socialLink ?? [];

            $location = Location::find($request->locationID);

            $contact = collect([
                'mobile' => $request->mobile ?? '',
                'phone' => $request->phone ?? '',
                'whatsApp' => $request->WhatsApp ?? '',
                'viber' => $request->Viber ?? ''
            ]);


            $faqDatas = [];
            $faqData = [];
            foreach ($questions as $x => $question){
                $faqData['question'] = $question;
                $faqData['answer'] = $answers[$x];
                $faqDatas[] = $faqData;
            }

            $additional_arr = collect(['description' => $request->additional]);
            $additional_arrs = $additional_arr->put('partyType', $request->partyType);
            $additional_arrs2 = $additional_arrs->put('faq', $faqDatas);
            $additional = $additional_arrs2->toJson();


            $dbContact = $contact->toJson();//($contact->count() > 0 ? $contact->toJson() : [] );


            $facility = collect($request->facility);
            $dbFacility = $facility->toJson();//($facility->count() > 0 ? $facility->toJson() : [] );
            $rules = collect($request->rules);
            $dbRules = $rules->toJson();//($rules->count() > 0 ? $rules->toJson() : [] );


            $priceDatas = [];
            $priceData = [];
            foreach ($packages as $i => $package){
                $priceData['name'] = $package;
                $priceData['item'] = $items[$i];
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

                //############ 1170x780 ###########
                $fileName = 'profile_'.md5(date('d-m-y H:i:s')).'.'.$extension;
                $photo = Image::make($request->file('primaryPhoto'));
                $photo->resize(512, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo->resizeCanvas(512, 512, 'center', false, 'rgba(255, 255, 255, 0)');
                $photo_main = $photo->stream($extension);

                Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                //############ 1170x780 ###########

                $photoData['photo'] = $fileName;

                $photoDatas[] = $photoData;
            }

            if($request->hasfile('gallery'))
            {
                foreach($request->file('gallery') as $k => $file)
                {
                    $extension = $file->extension();
                    //############ 1170x780 ###########
                    $fileName = 'gallery_'.$k.md5(date('d-m-y H:i:s')).'.'.$extension;
                    $photo = Image::make($file);
                    $photo->resize(1170, 780, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $photo->resizeCanvas(1170, 780, 'center', false, 'rgba(255, 255, 255, 0)');
                    $photo_main = $photo->stream($extension);

                    Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                    //############ 1170x780 ###########

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
            $table->lat = $location->lat ?? '23.78';
            $table->lon = $location->lon ?? '90.40';
            $table->address = $request->address;
            $table->landmark = $request->landmark;
            $table->minGuest = $request->minGuest;
            $table->maxGuest = $request->maxGuest;
            $table->website = $request->website;
            $table->additional = $additional;
            $table->contact = $dbContact;
            $table->pricing = $dbPrice;
            $table->facility = $dbFacility;
            $table->rules = $dbRules;
            $table->social = $dbSocial;
            $table->photos = $dbPhotos;
            $table->description = $request->description;
            $table->vendorID = $request->vendorID;
            $table->save();


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with('save', true);
    }


    public function edit($id, Request $request){
       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|min:2',
            'additional' => 'max:255',
            'mobile' => 'required|max:11|min:11',
            'email' => 'nullable|email',
            'locationID' => 'required|numeric',
            'vendorID' => 'required|numeric',
            'primaryPhoto' => 'file',
            'minGuest' => 'required|numeric',
            'maxGuest' => 'required|numeric',
            'serviceType' => 'required',
            'gallery.*' => 'file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true)->withErrors($validator)->withInput();
        }


        DB::beginTransaction();
        try {

            $table = Services::find($id);
            $photoDatas = json_decode($table->photos, true);


            $packages = $request->package ?? [];
            $price = $request->price ?? [];
            $items = $request->items ?? [];

            $questions = $request->question ?? [];
            $answers = $request->answer ?? [];

            $photoName = $request->photoName ?? [];

            $socialNames = $request->socialName ?? [];
            $socialLink = $request->socialLink ?? [];

            $location = Location::find($request->locationID);

            $contact = collect([
                'mobile' => $request->mobile ?? '',
                'phone' => $request->phone ?? '',
                'whatsApp' => $request->WhatsApp ?? '',
                'viber' => $request->Viber ?? ''
            ]);

            $faqDatas = [];
            $faqData = [];
            foreach ($questions as $x => $question){
                $faqData['question'] = $question;
                $faqData['answer'] = $answers[$x];
                $faqDatas[] = $faqData;
            }


            $additional_arr = collect(['description' => $request->additional]);
            $additional_arrs = $additional_arr->put('partyType', $request->partyType);
            $additional_arrs2 = $additional_arrs->put('faq', $faqDatas);
            $additional = $additional_arrs2->toJson();

            $dbContact = $contact->toJson();//($contact->count() > 0 ? $contact->toJson() : [] );


            $facility = collect($request->facility);
            $dbFacility = $facility->toJson();//($facility->count() > 0 ? $facility->toJson() : [] );
            $rules = collect($request->rules);
            $dbRules = $rules->toJson();//($rules->count() > 0 ? $rules->toJson() : [] );


            $priceDatas = [];
            $priceData = [];
            foreach ($packages as $i => $package){
                $priceData['name'] = $package;
                $priceData['item'] = $items[$i];
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
                    //############ 1170x780 ###########
                    $fileName = 'gallery_'.$k.md5(date('d-m-y H:i:s')).'.'.$extension;
                    $photo = Image::make($file);
                    $photo->resize(1170, 780, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $photo->resizeCanvas(1170, 780, 'center', false, 'rgba(255, 255, 255, 0)');
                    $photo_main = $photo->stream($extension);

                    Storage::disk('gallery')->put($fileName, $photo_main->__toString());
                    //############ 1170x780 ###########

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
            $table->lat = $location->lat ?? '23.78';
            $table->lon = $location->lon ?? '90.40';
            $table->address = $request->address;
            $table->landmark = $request->landmark;
            $table->minGuest = $request->minGuest;
            $table->maxGuest = $request->maxGuest;
            $table->website = $request->website;
            $table->additional = $additional;
            $table->contact = $dbContact;
            $table->pricing = $dbPrice;
            $table->facility = $dbFacility;
            $table->rules = $dbRules;
            $table->social = $dbSocial;
            $table->photos = $dbPhotos;
            $table->description = $request->description;
            $table->vendorID = $request->vendorID;
            $table->save();


        DB::commit();
            } catch (\Throwable $e) {
        DB::rollback();
            throw $e;
        }

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
