<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
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

    protected $fillable = [
        'name',
        'rut',
        'region_id',//no es necesario teniendo el id de la comuna
        'commune_id',
        'address',
        'phone',
        'start_date',
        'created_by',
        'state_id',
    ];
}
