<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $table = Booking::where('status', 'Pending')->get();
        return view('booking.booking')->with(['table' => $table]);
    }
}
