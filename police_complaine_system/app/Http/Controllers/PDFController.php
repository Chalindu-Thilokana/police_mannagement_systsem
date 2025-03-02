<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use FontLib\Table\Type\name;

class PDFController extends Controller
{
    //


    public function generatePDF(Request $request, $id)
    {
        $user = Auth::user();
    
        if ($user->userType == 'SuperAdmin') {
            // Super Admin can see all complaints
            $complain = Complain::find($id);
        } elseif ($user->userType == 'branchAdmin') {
            // Branch Admin can see complaints related to their branch
            $complain = Complain::where('branch_id', $user->branch_id)->where('id', $id)->first();
        } elseif ($user->userType == 'SubAdmin') {
            // Sub Admin can see complaints assigned to them
            $complain = Complain::where('admin_id', $user->id)->where('id', $id)->first();
        } elseif ($user->userType == 'user') {
            // User can see only their complaints
            $complain = Complain::where('user_id', $user->id)->where('id', $id)->first();
        } else {
            // Default null if user role doesn't match
            $complain = null;
        }
    
        // Check if complaint exists
        if (!$complain) {
            return response()->json(['error' => 'Complaint not found'], 404);
        }
    
        $data = [
            'title' => 'Sri Lanka Police Inquiry Report',
            'complain' => $complain
        ]; 
    
        $pdf = Pdf::loadView('system.user_pages.pdf', $data);
        return $pdf->download('generated-file.pdf');
    }
    public function reportgeneratePDF(Request $request){

        $user = Auth::user();

        if ($user->userType == 'SuperAdmin') {
          //  $complains = Complain::all();
            // Fetch all categories with count of related complaints
            $categories = Category::withCount('complain')->paginate(8);
        } elseif ($user->userType == 'branchAdmin') {
           // $complains = Complain::where('branch_id', $user->branch_id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            }])->paginate(8);
        } elseif ($user->userType == 'SubAdmin') {
           // $complains = Complain::where('admin_id', $user->id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('admin_id', $user->id);
            }])->paginate(8);
        } elseif ($user->userType == 'user') {
           // $complains = Complain::where('user_id', $user->id)->get();
            $categories = Category::withCount(['complain' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])->paginate(8);
        } else {
          //  $complains = collect();
            $categories = null;
        }
    
       // $branchs = Branch::all();
       if($user->userType == 'SubAdmin') {
       $branchs = Branch::where('id', $user->branch_id)->get();
       $name = $user->name ;
       $data = [
        'title' => 'Sri Lanka Police ' .$branchs->first()->branch_name." ".' simery Report',
        'categories' => $categories,
        'name' => $name
    ]; }
    elseif($user->userType == 'branchAdmin') {
        $branchs = Branch::where('id', $user->branch_id)->get();
        $data = [
         'title' => 'Sri Lanka Police ' .$branchs->first()->branch_name.' branch simery Report',
         'categories' => $categories
     ]; }
     elseif($user->userType == 'user') {
        $name = $user->name ;
        $data = [
         'title' => 'Sri Lanka Police ' .' simery Report',
         'categories' => $categories,
         'name' => $name
     ]; }
    else {
       
     
        $data = [
         'title' => 'Sri Lanka Police all island complaince simery Report',
         'categories' => $categories
     ]; }



    $pdf = Pdf::loadView('system.user_pages.report_pdf_simery', $data);
    return $pdf->download('generated-file.pdf');
        // Pass the data to the view
    


    }
}