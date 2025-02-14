<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //

    protected $fillable = [
        
        'branch_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class,'branch_id');
    }
    public function complain()
    {
        return $this->hasMany(Branch::class,'branch_id' );
    }

}
