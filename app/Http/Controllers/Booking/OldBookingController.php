<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OldBookingController extends Controller
{
    public function index(){

        return view('booking.old_booking')->with([]);
    }
}
