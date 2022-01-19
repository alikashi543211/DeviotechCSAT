<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareGiverRecord extends Model
{
    use HasFactory;
    
    public function client_record()
    {
        return $this->belongsTo('App\Models\ClientRecord');
    }
}
