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
        return $this->belongsTo(User::class,'branch_id');
    }

}
