<?php

namespace App\Http\Controllers\Frontend;

use App\BookOption;
use App\Http\Controllers\Controller;
use App\Location;
use App\Party;
use App\Services;
use App\TimeSlot;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('frontend.event');
    }

    public function search(Request $request){
        //dd($request->all());
        $searchType = $request->searchType;
        $serviceType = $request->serviceType;
        $bookingDate = db_date($request->bookingDate);
        $timeSlotID = $request->timeSlot;
        $partyType = $request->partyType;
        $guestNumber = $request->guestNumber;
        $cardNumber = $request->cardNumber;
        $locationID = $request->locationID;
        $cityID = $request->city;

        $time_slot = TimeSlot::orderBy('name')->get();
        $party_type = Party::orderBy('name')->get();

        $location = Location::orderBy('id', 'DESC')->get();
        $city = Location::select('city')->orderBy('city', 'ASC')->where('city', '<>', null)->groupBy('city')->get();

        $booking = BookOption::select('serviceID')->where('serviceDate', $bookingDate)->where('timeSlotID', $timeSlotID)->get();
        $booking_arr = $booking->toArray();

        $total_event = $tables = Services::where('serviceType', $serviceType)->count();

        //->where('additional', 'like', '%partyType%'.$partyType.'%')
        $tables = Services::where('serviceType', $serviceType)->where('locationID', $locationID)->where('additional', 'like', '%partyType%'.$partyType.'%')->whereNotIn('id', $booking_arr);
        if($guestNumber != null){
            $tables->where('minGuest', '<=', $guestNumber);
            $tables->where('maxGuest', '>=', $guestNumber);
        }
        $table = $tables->paginate(20);


        //dd($request->bookingDate);

      //  dd($table);

        return view('frontend.search')->with([
            'table' => $table,
            'searchType' => $searchType,
            'serviceType' => $serviceType,
            'bookingDate' => $request->bookingDate,
            'timeSlotID' => $timeSlotID,
            'partyType' => $partyType,
            'guestNumber' => $guestNumber,
            'cardNumber' => $cardNumber,
            'time_slot' => $time_slot,
            'party_type' => $party_type,
            'total_event' => $total_event,
            'location' => $location,
            'city' => $city,
            'locationID' => $locationID,
            'cityID' => $cityID,
            ]);
    }


    public function single($id, Request $request){

          $searchType = $request->searchType;
          $serviceType = $request->serviceType;
          $bookingDate = $request->bookingDate;
          $timeSlot = $request->timeSlot;
          $partyType = $request->partyType;
          $guestNumber = $request->guestNumber;
          $cardNumber = $request->cardNumber;

        $table = Services::find($id);


        return view('frontend.single-service')->with([
            'table' => $table,
            'searchType' => $searchType,
            'serviceType' => $serviceType,
            'bookingDate' => $bookingDate,
            'timeSlotID' => $timeSlot,
            'partyType' => $partyType,
            'guestNumber' => $guestNumber,
            'cardNumber' => $cardNumber,
            ]);

    }

    public function show_light_box(Request $request){
        //dd($request->all());
        $searchType = $request->searchType;
        $serviceType = $request->serviceType;
        $bookingDate = db_date($request->bookingDate);
        $timeSlot = $request->timeSlotID;
        $partyType = $request->partyType;
        $guestNumber = $request->guestNumber;
        $cardNumber = $request->cardNumber;

        $table = Services::find($request->id);
        $time_slot = TimeSlot::orderBy('name')->get();
        $party_type = Party::orderBy('name')->get();

        return view('frontend.light-box.add-cart')->with([
            'table' => $table,
            'time_slot' => $time_slot,
            'party_type' => $party_type,
            'searchType' => $searchType,
            'serviceType' => $serviceType,
            'bookingDate' => $bookingDate,
            'timeSlotID' => $timeSlot,
            'partyType' => $partyType,
            'guestNumber' => $guestNumber,
            'cardNumber' => $cardNumber,
        ]);
    }

}
