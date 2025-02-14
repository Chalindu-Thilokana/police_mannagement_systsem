<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    //
    protected $fillable = [
         'nic',
        
      'category_id',
        'branch_id',
        'address',
    
        'phone',
        'topic',
        'details',
        'file',
        
        'status', // defult status: pending
        'incuvery_data',// incuvery karakm null kalama me colem ekt update wenne 
        
        'user_id',
        'admin_id',//null thiyenne asign karakm 
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id' );
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id' );
    }
}
