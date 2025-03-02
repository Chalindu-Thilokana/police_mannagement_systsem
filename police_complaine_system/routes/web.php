<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\CategoryController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\PDFController;


use App\Http\Controllers\BranchController;
Route::get('/', function () {
    return view('site.web.index');
});


// Route::get('/', function () {
//     return view('site.web.index');
// });

//home page
Route::get('/', [HomeController::class, 'index'])->name('home');

//send message
Route::post('/message/store', [HomeController::class, 'store'])->name('message');


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

            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

            //reject route(isuru)
            Route::post('/complain/reject/{id}', [ComplainController::class, 'reject'])->name('complain.reject');
            Route::post('/complain/delete/{id}', [ComplainController::class, 'destroy'])->name('complain.delete');
           
            Route::get('/asign/create{id}',[ComplainController::class, 'show'])->name('asign_create');
            Route::put('/asign/{id}',[ComplainController::class, 'asign'])->name('asign');

            Route::get('/trancefer/create{id}',[ComplainController::class, 'trance_create'])->name('trancefer_create');
            Route::put('/trancefer/{id}',[ComplainController::class, 'trancefer'])->name('trancefer');
             


        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SuperAdmin'])->group(function () {
          //only supper admin can access this route

          //category routes
          Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
          Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
          Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
          Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



          //user routes
       

          //guest messages
          Route::get('/messages', [HomeController::class, 'admin'])->name('messages.view');
          Route::delete('/messages/{id}', [HomeController::class, 'destroy'])->name('messages.destroy');


          //branch routes

          Route::get('/branches', [BranchController::class, 'index'])->name('Branch.index');
          Route::post('/branches/store', [BranchController::class, 'store'])->name('Branch.store');
          Route::post('/branches/update', [BranchController::class, 'update'])->name('Branch.update');
          Route::delete('/branches/{id}', [BranchController::class, 'destroy'])->name('Branch.destroy');

            //branch admin routes
            Route::get('/branchadmin', [BranchController::class, 'create'])->name('branchadmin');
            Route::get('/branchadmin/create', [BranchController::class, 'show'])->name('branchadmin.create');
            Route::post('/branchadmin/store', [BranchController::class, 'save'])->name('branchadmin.store');
            Route::get('/branchadmin/{id}/edit', [BranchController::class, 'edit'])->name('branchadmin.edit');
            Route::put('/branchadmin/update/{id}', [BranchController::class, 'change'])->name('branchadmin.update');
            Route::delete('/branchadmin/delete/{id}', [BranchController::class, 'delete'])->name('branchadmin.destroy');
        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:SubAdmin,branchAdmin'])->group(function () {
            //only sub admin can access this route
              //sub admins
              Route::post('/inquaring/{id}',[ComplainController::class, 'update'])->name('inquaring');

    
  
  
          });


        
        Route::middleware(['auth:sanctum', 'verified', 'userType:user'])->group(function () {
            //only user admin can access this route
            Route::get('/complain/create', [ComplainController::class, 'create'])->name('complain');

            //rourte(isuru)
            Route::post('/complain/store', [ComplainController::class, 'store'])->name('complain.store');
          

        });


        Route::middleware(['auth:sanctum', 'verified', 'userType:branchAdmin,SubAdmin,SuperAdmin,user'])->group(function () {
            //only sub & branch admin can access this route
            Route::get('/complain/pending', [ComplainController::class, 'pending'])->name('complain.pending');
            Route::get('/complain/{id}', [ComplainController::class, 'inquaring'])->name('complain.show');
          
            Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate-pdf');
            Route::get('/report/generate-pdf', [PDFController::class, 'reportgeneratePDF'])->name('report-generate-pdf');
 

         Route::get('complin_filt',[ComplainController::class, 'filter'])->name('fillt_mycomplaince');

        });
       // Route::get('/complain/filter', [ComplainController::class, 'filter'])->name('complain.filter');

});
