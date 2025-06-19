<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{   
    use SoftDeletes; 
    use HasFactory;
    
    public function provincia()
    {  
        return $this->belongsTo(Province::class,'id_province');
    }
    public function region()
    {  
        return $this->belongsTo(Region::class,'id_region');
    }

    protected $fillable = [
        'id_province',
        'name',
        'code',
    ];
}
