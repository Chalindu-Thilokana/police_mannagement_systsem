<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\CategoryController;
Route::get('/', function () {
    return view('site.web.index');
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');


    
    
    //
     /*   Route::get('/dash_new', function () {

            if (Gate::denies('manageUsers')) {
                abort(403, 'Unauthorized.');
            }
            
        })->name('dash_new'); */
    

        Route::middleware(['auth:sanctum', 'verified', 'userType:branchAdmin'])->group(function () {
            //only supper admin can access this route
        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SuperAdmin'])->group(function () {
          //only supper admin can access this route

          Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
          Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
          Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');

          
      

        


        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SubAdmin'])->group(function () {
            //only sub admin can access this route
              
            
    
  
  
          });


        
        Route::middleware(['auth:sanctum', 'verified', 'userType:user'])->group(function () {
            //only user admin can access this route


        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:branchAdmin,subAdmin'])->group(function () {
            //only sub & branch admin can access this route


        });
});
