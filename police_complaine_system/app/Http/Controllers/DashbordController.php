<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;

class DashbordController extends Controller
{
    //


    public function index()
    {
        // all users data view this function
        $complains=Complain::all();
        return view('system.user_pages.pending',compact('complains'));
    }

}
