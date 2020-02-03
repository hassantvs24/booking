<?php

namespace App\Http\Controllers\Dashboard;

use App\Booking;
use App\BookOption;
use App\Http\Controllers\Controller;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $new_book = Booking::select('id')->where('status', 'Pending')->count();
        $running_book = Booking::select('id')->where('status', 'Running')->count();
        $complete_book = Booking::select('id')->where('status', 'Complete')->count();
        return view('dashboard.dashboard')->with(['new_book' => $new_book, 'running_book' => $running_book, 'complete_book' => $complete_book]);
    }


    public function event_calender(){
        $gen_date = date("Y-m-d H:i:s", strtotime("-1 month"));
        //dd($data);
        $bookingIDs = Booking::select('id')->whereIn('status', ['Pending','Running'])->pluck('id')->toArray();

        $table = BookOption::where('created_at', '>', $gen_date )->whereIn('bookingID', $bookingIDs)->get();

        if(Auth::user()->userType == 'Vendor') {
            $selected = Services::select('id')->where('vendorID', Auth::user()->id)->pluck('id')->toArray();

            $table = BookOption::where('isComplete', null)->where('created_at', '>', $gen_date )->whereIn('bookingID', $bookingIDs)->whereIn('serviceID', $selected)->get();
        }

        $data = array();
        $color = array('#00cc99', '#ff6666', '#b366ff', '#6666ff', '#ffa64d', '#cc6666', '#669999', '#00e6ac', '#800000', '#33ccff');
        $random_keys = array_rand($color, 10);
        foreach ($table as $row){
           $rowData['title'] = ($row->isComplete != null ? '* ' : '').$row->service['serviceType']; //'('.$row->bookingID.') '.$row->service['serviceType'];
           $rowData['description'] = route('booking-show', ['id' => $row->bookingID]);
           $rowData['start'] = $row->serviceDate.' '.$row->time_slot['fromTime'];
           $rowData['end'] = $row->serviceDate.' '.$row->time_slot['toTime'];
           $rowData['color'] = $color[$random_keys[rand(0,9)]];

            $data[]=$rowData;

        }

       return response()->json($data);
    }

}
