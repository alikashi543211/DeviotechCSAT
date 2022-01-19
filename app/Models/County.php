<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function localities()
    {
        return $this->hasMany(Locality::class, 'county_id', 'id');
    }

	public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

}
