<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionStoreRequest;
use App\Models\Institution;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        request()->validate([
            'search' => ['nullable', 'string'],
            'per_page' => ['nullable', 'integer', 'in:5,10,25,50'],
        ]);

        $query = Institution::with('state', 'creator');

        if ($search = request('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
            });
        }
        $perPage = request('per_page', 10);

        $institutions = $query->paginate($perPage)->withQueryString();
        
        return Inertia::render('Dashboard', [
            'regions' => Region::with('province.comuna')->get(),
            'institutions' => $institutions,
            'filters' => request()->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return Inertia::render('Institution/Create', [
            'regions' => Region::with('province.comuna')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstitutionStoreRequest $request)
    {
        try {
            $user = Auth::user();
            $newInstitution = Institution::Create([
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
            $institution = Institution::findOrFail($id);
            if ($institution) {
                $institution->delete();
                #Validar relaciones
            }
        } catch (\Throwable $th) {
            error_log($th);
            Log::error($th);
        }
        
        
    }
}
