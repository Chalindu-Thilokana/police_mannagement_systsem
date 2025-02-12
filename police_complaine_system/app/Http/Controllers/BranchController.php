<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $branches=Branch::all();
        return view('system.supper_admin.branch_create', compact('branches'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            $validatedData = $request->validate([
                'branch_name' => 'required|string|max:25|min:3|unique:branches,branch_name',
            ]); 
        
            Branch::create([
                'branch_name' => $validatedData['branch_name'],
            ]);
        
            Alert::success('Success', 'Branch added successfully!');
      
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
           
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
        


        $request->validate([
            'id' => 'required|exists:branches,id',
            'branch_name' => 'required|string|max:25 |min:3',
        ]);

        $branch = Branch::findOrFail($request->id);
        $branch->branch_name = $request->branch_name;
        $branch->save();

        return response()->json(['success' => 'Branch updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch, $id)
    {
        //

        
        try {

        $branch = Branch::findOrFail($id);
        $branch->delete();

        return response()->json(['success' => 'Branch deleted successfully!']);
    

       } catch (\Exception $e) {
    Alert::error('Error', 'Something went wrong!');

    }
    return redirect()->back();
    }
}
