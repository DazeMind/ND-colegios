<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    public function region()
    {  
        return $this->belongsTo(Region::class,'id_region');
    }
    public function comuna()
    {  
        return $this->hasMany(Commune::class,'id_province');
    }
    use SoftDeletes; 
    use HasFactory;
    protected $fillable = [
        'id_region',
        'name',
        'code',
    ];
}