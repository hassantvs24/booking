<?php

namespace App\Http\Controllers\Frontend;

use App\Booking;
use App\BookOption;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Services;
use App\TempBook;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout');
    }

    public function add_cart(Request $request){
        if (!Cookie::get('unique_session')) {
            $random = bcrypt(Str::random(20).date('Y-m-d H:i:s'));
            Cookie::queue('unique_session', $random, 4320);
        }
        $uniq_value = Cookie::get('unique_session');

        $qty = $request->guestNumber ?? 1;

        $price_package = explode(', ', $request->pricing);
        $pricing = $price_package[0];
        $package_key = $price_package[1];

        $service = Services::find($request->serviceID);
        $package_price = json_decode($service->pricing, true);
        $packages = collect($package_price[$package_key]);

        $before_save = TempBook::where('serviceID', $request->serviceID)->where('uniqValue', $uniq_value)->count();

        if($before_save > 0){
            TempBook::where('serviceID', $request->serviceID)->where('uniqValue', $uniq_value)->delete();

            $table = new TempBook();
            $table->uniqValue = $uniq_value;
            $table->serviceID = $request->serviceID;
            $table->serviceDate = db_date($request->bookingDate);
            $table->timeSlotID = $request->timeSlotID;
            $table->package = $packages->toJson();
            $table->pricing = $pricing;
            $table->qty = $request->guestNumber;
            $table->save();
        }else{
            $table = new TempBook();
            $table->uniqValue = $uniq_value;
            $table->serviceID = $request->serviceID;
            $table->serviceDate = db_date($request->bookingDate);
            $table->timeSlotID = $request->timeSlotID;
            $table->package = $packages->toJson();
            $table->pricing = $pricing;
            $table->qty = $qty;
            $table->save();
        }

        return redirect()->back()->with('save', true);

    }


    public function del_cart($id){
        TempBook::destroy($id);
        return redirect()->back()->with('del', true);
    }


    public function checkout(Request $request){
        //dd($request->all());

        //dd($uniq_value);

            $uniq_value = Cookie::get('unique_session');
            $userID = Auth::user()->id;
            $discount = collect(['types' => 'General', 'description' => '', 'amount' => 0]);
            $additionalCost = collect(['types' => 'General', 'description' => '', 'amount' => 0]);
            $status = 'Pending';
            $otherDescription = collect(['otherInformation' => $request->additionalInformation]);

            $table = TempBook::where('uniqValue', $uniq_value)->get();

            if($table->count() > 0){

                DB::beginTransaction();
                try {

                $booking = new Booking();
                $booking->userID = $userID;
                $booking->discount = $discount->toJson();
                $booking->additionalCost = $additionalCost->toJson();
                $booking->status = $status;
                $booking->otherDescription = $otherDescription->toJson();
                $booking->save();

                $bookingID = $booking->id;

                $total_amount = 0;
                foreach ($table as $row){

                    $book_item = new BookOption();
                    $book_item->bookingID = $bookingID;
                    $book_item->serviceID = $row->serviceID;
                    $book_item->serviceDate = $row->serviceDate;
                    $book_item->timeSlotID = $row->timeSlotID;
                    $book_item->package = $row->package;
                    $book_item->pricing = $row->pricing;
                    $book_item->qty = $row->qty;
                    $book_item->save();

                    $total_amount += ($row->pricing * $row->qty);
                }

                $payMethod = $request->payMethod;
                switch ($payMethod) {
                    case "Card":
                        $payDescription = collect(['payMethod' => 'Card', 'cardType' => $request->cardType, 'cardHolder' => $request->name, 'cardNumber' => $request->cardNumber, 'expireDate' => $request->expireDate, 'cvv' => $request->cvv]);
                        break;
                    case "Bank":
                        $slipFile = 'payslip_'.$bookingID.'_'.md5(date('Y-m-d h:i:s a')).'.jpg';
                        if($request->hasfile('slipFile'))
                        {
                            $uploadedFile = $request->file('slipFile');
                            $uploadedFile->move('public/slip/', $slipFile);
                        }
                        $payDescription = collect(['payMethod' => 'Bank', 'bankName' => $request->bankName, 'slipNo' => $request->slipNo, 'slipFile' => $slipFile]);
                        break;
                    case "Bkash":
                        $payDescription = collect(['payMethod' => 'Bkash', 'bkashNo' => $request->bkashNo, 'transectionID' => $request->transectionID]);
                        break;
                    case "Rocket":
                        $payDescription = collect(['payMethod' => 'Rocket', 'rocketNo' => $request->rocketNo, 'transectionID' => $request->transectionID]);
                        break;
                    case "Account":
                        $user = User::find($userID);
                        $user->balance = $request->balance;
                        $user->save();
                        $payDescription = collect(['payMethod' => 'Account', 'transectionID' => 1]);
                        break;
                    default:
                        $payDescription = collect([]);
                }

                if($request->payAmount > 0){
                    $payment = new Payment();
                    $payment->userID = $userID;
                    $payment->payMethod = $request->payMethod;
                    $payment->payType = 'IN';
                    $payment->amountIN = $request->payAmount;
                    $payment->ref = 'Booking';
                    $payment->refID = $bookingID;
                    $payment->payDescription = $payDescription->toJson();
                    $payment->save();
                }

                TempBook::where('uniqValue', $uniq_value)->delete();

                $random = bcrypt(Str::random(20).date('Y-m-d H:i:s'));
                Cookie::queue('unique_session', $random, 4320); //3 days remember

                    DB::commit();
                } catch (\Throwable $e) {
                    DB::rollback();
                    throw $e;
                }

            }else{
                return redirect()->route('front.home')->with('error', true);
            }


        return redirect()->route('front.user')->with('save', true);
    }


}
