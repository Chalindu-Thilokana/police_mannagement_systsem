<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class DashbordController extends Controller
{
    //


    public function index()
    {
        // all users data view this function
        $user = Auth::user();

    if ($user->userType == 'SuperAdmin') {
        // Super Admin can see all complaints
        $complains = Complain::all();
    } elseif ($user->userType == 'branchAdmin') {
        // Branch Admin can see complaints related to their branch
        $complains = Complain::where('branch_id', $user->branch_id)->get();
    } elseif ($user->userType == 'subAdmin') {
        // Sub Admin can see complaints assigned to them
        $complains = Complain::where('admin_id', $user->id)->get();
    } elseif ($user->userType == 'user') {
        // User can see only their complaints
        $complains = Complain::where('user_id', $user->id)->get();
    } else {
        // Default empty collection if user role doesn't match
        $complains = collect();
    }

    
    return view('system.user_pages.pending', compact('complains'));
    }

}
