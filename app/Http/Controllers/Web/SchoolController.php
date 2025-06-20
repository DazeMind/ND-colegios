<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolStoreRequest;
use App\Models\Institution;
use App\Models\Region;
use App\Models\School;
use App\Models\SchoolUser;
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
        return Inertia::render('School/Index', [
            'regions' => Region::with('province.comuna')->get(),
            'institutions' => Institution::with('state','creator')->get(),
            'schools' => School::with('state','creator','institution')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('School/Create', [
            'regions' => Region::with('province.comuna')->get(),
            'institutions' => Institution::get(),
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
                'institution_id'=> $request->input('institution_id'),
                'name'=> $request->input('name'),
                'rut'=> $request->input('rut'),
                'region_id'=> $request->input('region'),
                'commune_id'=> $request->input('commune'),
                'address'=> $request->input('address'),
                'phone'=> $request->input('phone'),
                'state_id'=> 1, //state default 1 Aceptado
                'start_date'=> $request->input('start_date'),
                'created_by'=> $user->id, 
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
                $schools_users = SchoolUser::where('school_id', $school->id)->get();
                if ($schools_users) {
                    foreach ($schools_users as $S_U) {
                        $S_U->delete();
                    }
                    $school->delete();
                }
            }
        } catch (\Throwable $th) {
            error_log($th);
            Log::error($th);
        }
        return;
    }
}
