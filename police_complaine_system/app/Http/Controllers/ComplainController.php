<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Asign;
use App\Mail\Trancer;
use App\Mail\Complte;
use App\Mail\Delete;
use PhpParser\Node\Expr\Assign;

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


        $mail = User::find($complain->user_id)->email;


        //dd($mail);
        $data = [
            'title' => 'acsepeted complain!',
            'message' => ' Referre by you '. $complain->created_at.' Your complain has been successfully acsepeted on sei lanka police. '.$complain->topic. ' Assign by officer  '.$complain->admin->name.' It is now live and visible.
              Thank you for choosing Your complaint has been received by our police station. Thank you for contacting us. We will take steps to investigate your complaint..',
              'finel' => 'best of regards',
              'branch' => 'sri lanka police branch of '. $complain->branch->branch_name,
        ];




         //email mail class eke call karala mail eka yawanw 
        Mail::to($mail)->send(new Asign($data));

        
            Alert::success('Success', 'Complain asign successfully!');
            return redirect()->route('dashboard');
        } catch (\Exception $e) 
             {
            Alert::error('Error', 'Something went wrong!'. $e->getMessage());
        return redirect()->back(); 

             }





        
    }
    
    /**
     * Show the form for editing the specified resource.
     */

     public function trance_create(Complain $complain, $id)
     {
         //
         $branches =Branch::all();
         return view('system.admin_bran.trancer', compact('id','branches',));

     }
     public function trancefer(Request $request,Complain $complain, $id)
     {        
        
        

         //
         try {
         $request->validate([
             'branch_id' => 'required|exists:branches,id',
         ]);
         $complain = Complain ::find($id);
         $curent = $complain->branch ? $complain->branch->branch_name : 'Unknown Branch';
         $complain->update([
            'status' => 'Trancefered',
         'branch_id' => $request['branch_id'],
        ]);


        $complain->refresh();


         $mail = User::find($complain->user_id)->email;


        //dd($mail);
        $data = [
            'title' => 'trancefered complain!',
            'message' => ' Referre by you '. $complain->created_at.' Your complain has been successfully trancefered  on sri lanka police. '.$complain->topic. ' tranceferd to  '.$complain->branch->branch_name.' It is now live and visible.Your complaint has been forwarded to the police station to which this complaint belongs.
             The investigation will be conducted by that police station.',
              'finel' => 'best of regards',
              'branch' => 'sri lanka police branch of '. $curent,
        ];




         //email mail class eke call karala mail eka yawanw 
         Mail::to($mail)->send(new Trancer($data));
       
                  
                  Alert::success('Success', 'Complain trancefer successfully!');
                  return redirect()->route('dashboard'); }
                  catch (\Exception $e) {
                  Alert::error('Error', 'Something went wrong!'. $e->getMessage());
                  return redirect()->back(); }
     }
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complain $complain, $id)
    {
        //
        try {
            $request->validate([
                'incuvery_data' => 'required' ,
            ]);
            $user = Auth::user()->id ;
            $complain = Complain ::findOrFail($id);
            $curent = $complain->branch ? $complain->branch->branch_name : 'Unknown Branch';

            $complain->update([
               'status' => 'proceced',
            'incuvery_data' => $request['incuvery_data'],
           // 'user_id' => 'user',
                     ]);

                     $complain->refresh();


                     $mail = User::find($complain->user_id)->email;
            
            
                    //dd($mail);
                    $data = [
                        'title' => 'incuvery complete complain!',
                        'message' => ' Referre by you '. $complain->created_at.' Your complain has been successfully incuvery complete   on sri lanka police. '.$complain->topic. ' tranceferd to  '.$complain->branch->branch_name.' It is now live and visible .Your complaint has been investigated and a final decision has been made. Please continue to use our online complaint service..',
                          'finel' => 'best of regards',
                          'branch' => 'sri lanka police branch of '. $curent,
                    ];
            
            
            
            
                     //email mail class eke call karala mail eka yawanw 
                     Mail::to($mail)->send(new Complte($data));

                     Alert::success('Success', 'Complain updated successfully!');
                     return redirect()->route('dashboard'); }
                     catch (\Exception $e) {
                     Alert::error('Error', 'Something went wrong!'. $e->getMessage());
                     return redirect()->back(); }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain,$id)
    {
        $curent = $complain->branch ? $complain->branch->branch_name : 'Unknown Branch';

        try {
            $complain = Complain::findOrFail($id);
            $complain->delete();

            Alert::success('Success', 'Complain deleted successfully!');

            $mail = User::find($complain->user_id)->email;
            
            
            //dd($mail);
            $data = [
                'title' => 'delete complain!',
                'message' =>' Referre by you '. $complain->created_at.' Relevant to the day Your Complaint has been successfully deleted   on sri lanka police. '.$complain->topic. ' delete to  '.$complain->branch->branch_name.' It is now live and visible to potential buyers. You can manage or edit your ad anytime from your dashboard.
                  Thank you for choosing .',
                  'finel' => 'best of regards',
                  'branch' => 'sri lanka police branch of '. $curent,
            ];
    
    
    
    
             //email mail class eke call karala mail eka yawanw 
             Mail::to($mail)->send(new Delete($data));
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong!');
        }
        return redirect()->back();
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $branch = $request->get('branch'); 
        // Fix typo: "catergory" -> "category"
        $category = $request->get('catergory');  
       
        $status = $request->get('status');
        $nic = $request->get('nic');
        $topic = $request->get('topic');
    
        // Start query
        $complains = Complain::query();
    
        // Role-based filtering
        switch ($user->userType) {
            case 'SuperAdmin':
                // No restrictions, SuperAdmin sees all complaints
                $categories = Category::withCount('complain')->paginate(8);


                break;
    
            case 'branchAdmin':
                // Branch Admin sees only their branch complaints
                $complains->where('branch_id', $user->branch_id);

                $categories = Category::withCount(['complain' => function ($query) use ($user) {
                    $query->where('branch_id', $user->branch_id);
                }])->paginate(8);
                break;
    
            case 'SubAdmin':
                // Sub Admin sees only complaints assigned to them
                $complains->where('admin_id', $user->id);
                $categories = Category::withCount(['complain' => function ($query) use ($user) {
                    $query->where('admin_id', $user->id);
                }])->paginate(8);
                break;
    
            case 'user':
                // User sees only their complaints
                $complains->where('user_id', $user->id);
                $categories = Category::withCount(['complain' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }])->paginate(8);
                break;
    
            default:
                // Unknown role, return empty collection
                return redirect()->route('dashboard');
        }
    
        // Apply filters if parameters exist

        if ($category || $branch || $status || $nic || $topic) {
            if(in_array(Auth::user()->userType, [ 'user','SuperAdmin'])){

        if ($branch) {
            $complains->where('branch_id', $branch);
        } }else{

        if ($category) {
            $complains->where('category_id', $category);
        }
        if ($status) {
            $complains->where('status', $status);
        }
        if ($nic) {
            $complains->where('nic', $nic);
        }
        if ($topic) {
            $complains->where('topic', $topic);
        } }
    
        // Get results after filtering
        $complains = $complains->get();
        
        // Load related data
        return view('system.user_pages.pending', [
            'complains' => $complains,
            'branchs' => Branch::all(),
             
        ] )->with(compact( 'categories'));
    }
    else {

        return redirect()->route('dashboard');
    }
        
    }
    
    
    
}
