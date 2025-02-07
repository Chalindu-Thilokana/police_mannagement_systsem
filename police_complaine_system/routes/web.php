<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
Route::get('/', function () {
    return view('site.web.index');
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    
    
    //
     /*   Route::get('/dash_new', function () {

            if (Gate::denies('manageUsers')) {
                abort(403, 'Unauthorized.');
            }
            
        })->name('dash_new'); */
    

        Route::middleware(['auth:sanctum', 'verified', 'userType:branchAdmin'])->group(function () {
            Route::get('/dash_new', function () {
                return view('system.supper_admin.category_create');
            })->name('dash_new');
        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SuperAdmin'])->group(function () {
          //only supper admin can access this route
            
          Route::get('/dash', function () {
            return view('system.supper_admin.category_create');
        })->name('dash_new');


        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SubAdmin'])->group(function () {
            //only supper admin can access this route
              
            
    
  
  
          });


        
        Route::middleware(['auth:sanctum', 'verified', 'userType:user'])->group(function () {
            //only supper admin can access this route


        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:branchAdmin,subAdmin'])->group(function () {
            //only supper admin can access this route


        });
});
