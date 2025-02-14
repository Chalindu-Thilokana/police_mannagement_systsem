<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        // branch admin create view 
        $branchAdmins = User::where('userType', 'branchAdmin')->get();
        return view('system.supper_admin.branch_admin_view', compact('branchAdmins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  branch create 

        try {
            $validatedData = $request->validate([
                'branch_name' => 'required|string|max:25|min:3|unique:branches,branch_name',
            ]); 
        
            Branch::create([
                'branch_name' => $validatedData['branch_name'],
            ]);
        
            Alert::success('Success', 'Category added successfully!');
      
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
           
        }
        return redirect()->back();
    }

    public function save(Request $request)
    {// branch admin create function 

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => 'required|in:branchAdmin', // Validation expects 'role'
              
                'branch' => 'required|integer|exists:branches,id',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'userType' => $request->role, // Use correct field name from form
                'branch_id' => $request->branch,
            ]);

            return redirect()->route('branchadmin')->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            alert()->error('error', 'Something went wrong: ' . $e->getMessage());
        }
        return redirect()->back();






    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //branch create view

        $branches=Branch::all();
        return view('system.supper_admin.branch_admin_create', compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch,$id)
    {
        // branch admin details edit send data
        $branches=Branch::all();
        $user = User::findOrFail($id);
        return view('system.supper_admin.branch_admin_update', compact('user','branches'));
    }

    public function change(Request $request, $id)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => "required|string|email|max:255|unique:users,email,$id",
           // 'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:branchAdmin', // Ensure role is correct
            'branch' => 'required|integer|exists:branches,id',

            'old_password' => 'nullable|string|min:8',
             'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->userType = $request->role;
        $user->branch_id = $request->branch;

        // Update password only if provided
        if ($request->filled('old_password') && $request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Old password is incorrect!');
            }

            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->route('branchadmin')->with('success', 'User updated successfully!');
    } catch (\Exception $e) {
        alert()->error('error', 'Something went wrong: ' . $e->getMessage());
    }
    return redirect()->back();

    
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
        
 try {

        $request->validate([
            'id' => 'required|exists:branches,id',
            'branch_name' => 'required|string|max:25 |min:3',
        ]);

        $branch = Branch::findOrFail($request->id);
        $branch->branch_name = $request->branch_name;
        $branch->save();

        return response()->json(['success' => 'Category updated successfully!']);
       
     } catch (\Exception $e) { alert()->error('error', 'Something went wrong: ' . $e->getMessage());
        return redirect()->back();
    }
    
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

        return response()->json(['success' => 'Category deleted successfully!']);
    

       } catch (\Exception $e) {
    Alert::error('Error', 'Something went wrong!'.$e->getMessage());

    }
    return redirect()->back();
    }



    public function delete(User $user, $id)
    {
        // brach admin delete function 

        
        try {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('branchadmin')->with(['success' => 'Category deleted successfully!']);
    

       } catch (\Exception $e) {
    Alert::error('Error', 'Something went wrong!'. $e->getMessage());

    }
    return redirect()->back();
    }
}
