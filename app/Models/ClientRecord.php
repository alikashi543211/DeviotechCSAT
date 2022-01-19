<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRecord extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function care_giver_records()
    {
    	return $this->hasMany(CareGiverRecord::class,'client_id','id');
    }    
}
