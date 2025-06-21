<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Rules\RutChileno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiInstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::with('commune')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $institutions
        ]);
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'rut' => ['required', 'string', 'max:10', 'unique:institutions', new RutChileno],
            'region_id' => 'required|integer|exists:regions,id',
            'commune_id' => 'required|integer|exists:communes,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'start_date' => 'required|date_format:Y-m-d',
            'state_id' => 'required|integer|exists:states,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $institution = Institution::create([
            'name' => $request->name,
            'rut' => $request->rut,
            'region_id' => $request->region_id,
            'commune_id' => $request->commune_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'start_date' => $request->start_date,
            'state_id' => $request->state_id ?? 1,
            'created_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'data' => $institution
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }
}
