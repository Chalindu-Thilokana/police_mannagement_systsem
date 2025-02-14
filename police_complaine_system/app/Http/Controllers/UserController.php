<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //view users
    public function index()
    {  

        $branchId = Auth::user()->branch_id;
        
        $users=User::where('branch_id', $branchId)->where('userType', 'SubAdmin')->get();
        return view('system.supper_admin.user.users', compact('users'));
    }

    //create users form
    public function create()
    {
        return view('system.supper_admin.user.add_user');
    }

    //create user
    public function store(Request $request) 
   
       {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => 'required|in:branchAdmin,SubAdmin', // Validation expects 'role'
              
            ]);
            $branchId = Auth::user()->branch_id;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'userType' => $request->role, // Use correct field name from form
                'branch_id' => $branchId,
            ]);

            return redirect()->route('users.index')->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            alert()->error('error', 'Something went wrong: ' . $e->getMessage());
        }
        return redirect()->back();
    }

    //edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('system.supper_admin.user.edit_user', compact('user'));
    }

    //seve edited data
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'role' => 'required|in:branchAdmin,SubAdmin',
                

                // Password validation (if user wants to update)
                'old_password' => 'nullable|string|min:6',
                'new_password' => 'nullable|string|min:6|confirmed',
            ]);

            if ($request->filled('old_password') && $request->filled('new_password')) {
                if (!Hash::check($request->old_password, $user->password)) {
                    return redirect()->back()->with('error', 'Old password is incorrect!');
                }
    
                $user->password = Hash::make($request->new_password);
            }
            $branchId = Auth::user()->branch_id;
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'userType' => $request->role,
                'branch_id' => $branchId,
            ]);

            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    //delete users
    public function destroy(User $user)
    {
        try {
            // Prevent SuperAdmin from deleting themselves
            
            $user->delete();

            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
