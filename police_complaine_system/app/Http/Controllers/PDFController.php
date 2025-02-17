<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
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
        } elseif ($user->userType == 'subAdmin') {
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
}    