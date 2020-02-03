<?php

namespace App\Http\Controllers\Frontend;

use App\Booking;
use App\BookOption;
use App\Http\Controllers\Controller;
use App\Payment;
use App\ServiceReview;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(){
        $selected = Booking::select('id')->where('userID', Auth::user()->id)->pluck('id')->toArray();

        $table = BookOption::orderBy('id', 'DESC')->whereIn('bookingID', $selected)->get();
        $payment = Payment::where('userID', Auth::user()->id)->get();
        return view('frontend.user-profile')->with(['table' => $table, 'payment' => $payment]);
    }

    public function review_save(Request $request){

        $validator = Validator::make($request->all(), [
            'userID' => 'required|numeric',
            'serviceID' => 'required|numeric',
            'bookingID' => 'required|numeric',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', true);
        }

        //$rate = ServiceReview::where('serviceID', $request->serviceID)->avg('rating');

        //dd($rate);

        DB::beginTransaction();
        try {

            $check = ServiceReview::where('serviceID', $request->serviceID)->where('userID', $request->userID)->where('bookingID', $request->bookingID)->count();

            if($check == 0){
                $table = new ServiceReview();
                $table->userID = $request->userID;
                $table->serviceID = $request->serviceID;
                $table->bookingID = $request->bookingID;
                $table->rating = $request->rating;
                $table->comment = $request->comment;
                $table->save();


                $rate = ServiceReview::where('serviceID', $request->serviceID)->avg('rating');

                $service = Services::find($request->serviceID);
                $service->rating = $rate;
                $service->save();
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with('save', true);
    }
}
