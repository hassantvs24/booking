<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\BookOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $bookingIDs = Booking::select('id')->where('status', 'Running')->pluck('id')->toArray();

        $table = BookOption::whereIn('bookingID', $bookingIDs)->get();

        return view('booking.task')->with(['table' => $table]);
    }

    public function change_status($id){

        DB::beginTransaction();
        try {
        $table = BookOption::find($id);
        $bookingID = $table->bookingID;
        $isComplete = $table->isComplete;
        if($isComplete == null){
            $table->isComplete = date('Y-m-d H:i:s');
        }else{
            $table->isComplete = null;
        }

        $table->save();

        $booking_task = BookOption::where('bookingID', $bookingID)->where('isComplete', null)->count();

        if($booking_task == 0){
            $booking = Booking::find($bookingID);
            $booking->status = 'Complete';
            $booking->save();
        }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with('save', true);

    }
}
