<?php

// In your controller (DashbordController.php)
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Prepare the complaint list based on the user type
        if ($user->userType == 'SuperAdmin') {
            $complains = Complain::all();
            // Fetch all categories with count of related complaints
            $categories = Category::withCount('complain')->paginate(8);
        } elseif ($user->userType == 'branchAdmin') {
            $complains = Complain::where('branch_id', $user->branch_id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            }])->paginate(8);
        } elseif ($user->userType == 'SubAdmin') {
            $complains = Complain::where('admin_id', $user->id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('admin_id', $user->id);
            }])->paginate(8);
        } elseif ($user->userType == 'user') {
            $complains = Complain::where('user_id', $user->id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])->paginate(8);
        } else {
            $complains = collect();
            $categories = collect();
        }

        $branchs = Branch::all();
        
        // Pass the data to the view
        return view('system.user_pages.pending', compact('complains', 'branchs', 'categories'));
    }
}
