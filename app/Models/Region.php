<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Region extends Model
{
     public function province()
     {  
        return $this->hasMany(Province::class,'id_region');
     }
     public function comuna()
     {  
        return $this->hasMany(Province::class,'id_region');
     }
     public function country()
     {  
        return $this->belongsTo(Country::class,'id_country');
     }
     use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'id_country',
        'name',
        'code',
    ];
}
