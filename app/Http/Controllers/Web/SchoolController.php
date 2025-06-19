<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolStoreRequest;
use App\Models\Region;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('School/Create', [
            'regions' => Region::with('province.comuna')->get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolStoreRequest $request)
    {
        try {
            $user = Auth::user();
            $newSchool = School::Create([
                'name'=> $request->input('name'),
                'rut'=> $request->input('rut'),
                'region_id'=> $request->input('region'),
                'commune_id'=> $request->input('commune'),
                'address'=> $request->input('address'),
                'phone'=> $request->input('phone'),
                'start_date'=> $request->input('start_date'),
                'created_by'=> $user->id, //asignamos el ID del usuario registrado que esta creando el registro
            ]);
        
        } catch (\Throwable $th) {
            error_log($th);
            Log::error($th);
        }
       return;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $school = School::findOrFail($id);
            if ($school) {
                $school->destroy();
            }
        } catch (\Throwable $th) {
            error_log($th);
            Log::error($th);
        }
        
    }
}
