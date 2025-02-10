<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('system.supper_admin.category', compact('categories'));
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
        try {
<<<<<<< HEAD
            // Validate request
            $request->validate([
                'name' => 'required|unique:categories,name|max:50'
            ]);

            // Create new category
            Category::create([
                'name' => $request->name,
            ]);

            // Flash success message
            session()->flash('success', 'Category added successfully!');

        } catch (ValidationException $e) {
            // Flash validation error messages
            session()->flash('error', $e->validator->errors()->first());
        } catch (QueryException $e) {
            // Handle database errors
            session()->flash('error', 'Something went wrong! Please try again.');
        }

=======
            $validatedData = $request->validate([
                'name' => 'required|string|max:25|min:3|unique:categories,name',
            ]); 
        
            Category::create([
                'name' => $validatedData['name'],
            ]);
        
            Alert::success('Success', 'Category added successfully!');
      
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
           
        }
>>>>>>> dba8211f10ae3ebd31b1a07e5d06e0c2436210be
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|max:25 |min:3',
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => 'Category updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
