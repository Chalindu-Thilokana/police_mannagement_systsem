<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
                'topic' => 'required|string|max:255',
                'details' => 'required|string|max:500',
                'file.*' => 'nullable|mimes:jpg,png,pdf|max:1024',
                'branch_id' => 'required|exists:branches,id',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
            ]);
        
            // Store files (if any)
            $filePaths = [];
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    // Store the file in 'public/complain' folder
                    $filePaths[] = $file->store('complain', 'public');
                }
            }
        
            // Create a new complain record
            $complain = Complain::create([
                'nic' => $validated['nic'],
                'phone' => $validated['phone'],
                'topic' => $validated['topic'],
                'details' => $validated['details'],
                'branch_id' => $validated['branch_id'],
                'category_id' => $validated['category_id'],
                'user_id' => $validated['user_id'],
                'file' => json_encode($filePaths), // Store file paths as JSON
            ]);
        
            Alert::success('Success', 'Complain added successfully!');
      
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
           
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        //
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
    public function destroy(Complain $complain)
    {
        //
    }
}
