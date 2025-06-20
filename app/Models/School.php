<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'school_users')->withTimestamps();
    }

    protected $fillable = [
        'name',
        'rut',
        'institution_id',
        'region_id',//no es necesario teniendo el id de la comuna
        'commune_id',
        'address',
        'phone',
        'created_by',
        'state_id',
    ];
}