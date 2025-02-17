<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations=Branch::all();
        $crimes=Category::all();
        return view('system.user_pages.newcomplain', compact('locations','crimes'));
    }

    public function pending()
    {
        return view('system.user_pages.pending');
    }

    public function inquaring($id)
    {
        $complain = Complain::with('user', 'branch', 'category')->findOrFail($id);
        return view('system.user_pages.inquary', compact('complain'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        try {
            $validated = $request->validate([
                'nic' => 'required|string|max:20',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:100',
                'topic' => 'required|string|max:255',
                'details' => 'required|string|max:500',
                'file.*' => 'nullable|mimes:jpg,png,pdf|max:1024',
                'branch_id' => 'required|exists:branches,id',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
                'file' => 'nullable|mimes:jpg,png,pdf|max:1024', 
            ]);
        
            // Store files (if any)
            $filePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                // Store the file in the 'public/complain' folder
                $filePath = $file->store('complain', 'public'); // Store in the public disk
            }
        
            // Create a new complain record
            $complain = Complain::create([
                'nic' => $validated['nic'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'topic' => $validated['topic'],
                'details' => $validated['details'],
                'branch_id' => $validated['branch_id'],
                'category_id' => $validated['category_id'],
                'user_id' => $validated['user_id'],
                'file' => $filePath ? $filePath : null, // Store file paths as JSON
            ]);
        
            Alert::success('Success', 'Complain added successfully!');
      
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!'. $e->getMessage());
           
        }
        return redirect()->back();
    }

    public function reject($id)
    {
        try {
            $complain = Complain::findOrFail($id);
            $complain->status = 'Rejected';
            $complain->save();

            Alert::success('Success', 'Complain rejected successfully!');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!'. $e->getMessage());
        }
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request,Complain $complain, $id)
    {
        //
        
        $branchId = Auth::user()->branch_id;
        $users=User::where('branch_id', $branchId)->where('userType', 'SubAdmin')->get();
        return view('system.admin_bran.task', compact('id','users',));
    }

    public function asign(Request $request,Complain $complain,$id)//asign sub admin 
    {
        // 

        //dd($request->all());

        try {
        $request->validate([
            'asign' => 'required|exists:users,id',
        ]);

        $complain = Complain ::find($id);
        $complain->update([

            'admin_id' => $request['asign'],
        'status' => 'Assigned',]);
            Alert::success('Success', 'Complain deleted successfully!');
            return redirect()->route('dashboard');
        } catch (\Exception $e) 
             {
            Alert::error('Error', 'Something went wrong!'. $e->getMessage());
        return redirect()->back(); }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $complain = Complain::findOrFail($id);
            $complain->delete();

            Alert::success('Success', 'Complain deleted successfully!');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
        }
        return redirect()->back();
    }
}
