<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //Toggle Sidebar
    public function saveState()
    {
        if (Session::has('sidebarState')) {
            Session::remove('sidebarState');
        } else {
            Session::put('sidebarState', 'sidebar-xs');
        }
    }
    //Toggle Sidebar

    public function not_found(){
        return view('frontend.404');
    }


    public function access(){
        return view('frontend.access');
    }


    public function refresh(){
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('cache:clear');

        return 'Refresh Website';
    }
}
