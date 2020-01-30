<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $table = Booking::where('status', 'Pending')->get();
        return view('booking.booking')->with(['table' => $table]);
    }

    public function status(Request $request){
       // dd($request->all());

        $table = Booking::find($request->id);
        $userID = $table->userID;
        $old_otherDescription = json_decode($table->otherDescription, true);
        $old_otherDescription['notesAdmin'] = $request->notes;

        if($request->status == 'Cancel'){
            $refund = $request->refund;

            switch ($refund) {
                case "cancel":
                    $old_otherDescription['refund'] = 'Cancel Payment';
                    Payment::where('ref', 'Booking')->where('refID', $request->id)->delete();
                    break;
                case "not_refund":
                    $old_otherDescription['refund'] = 'Payment not refund';
                    break;
                case "refund":
                    $old_otherDescription['refund'] = 'Payment refund by '.$request->payMethod.'. Total Refund '.money_c($request->payAmount);

                    if($request->payAmount > 0){

                        if($request->payMethod == 'Account'){
                            $user = User::find($userID);
                            $old_balance = $user->balance;
                            $balance = ($old_balance + $request->payAmount);
                            $user->balance = $balance;
                            $user->save();
                        }

                        $payDescription =  collect(['payMethod' => $request->payMethod, 'payType' => 'Refund', 'payDescription' => $request->description]);
                        $payment = new Payment();
                        $payment->userID = $userID;
                        $payment->payMethod = $request->payMethod;
                        $payment->payType = 'OUT';
                        $payment->amountOUT = $request->payAmount;
                        $payment->ref = 'Booking';
                        $payment->refID = $request->id;
                        $payment->isRefund = 1;
                        $payment->payDescription = $payDescription->toJson();
                        $payment->save();
                    }

                    break;
            }
        }

        $otherDescription = collect($old_otherDescription);
        $table->status = $request->status;
        $table->otherDescription = $otherDescription->toJson();
        $table->save();

        return redirect()->back()->with('edit', true);
    }

    public function show_booking($id){
        $table = Booking::find($id);
        return view('booking.lightbox.booking-info')->with(['table' => $table]);
    }

}
