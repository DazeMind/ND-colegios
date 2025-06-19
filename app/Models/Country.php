<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
     public function region()
     {  
        return $this->hasMany(Regiones::class,'id_country');
     }
     use SoftDeletes; 
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
    ];
}
