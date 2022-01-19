<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function county()
    {
        return $this->hasOne(County::class, 'province_id', 'id');
    }
}
