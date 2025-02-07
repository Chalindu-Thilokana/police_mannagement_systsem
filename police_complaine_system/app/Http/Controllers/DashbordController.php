<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    //


    public function index()
    {
        // all users data view this function
        return view('system.all.view_dashbord');
    }

}
