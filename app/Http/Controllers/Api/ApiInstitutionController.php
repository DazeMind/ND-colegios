<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiInstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::with('region', 'commune')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $institutions
        ]);
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'rut'           => [
                'required',
                'string',
                'max:20',
                'unique:institutions',
                function ($attribute, $value, $fail) {
                    // Si el valor está vacío, se asume que la regla 'required' lo manejará.
                    if (empty($value)) {
                        return;
                    }

                    // Expresión regular para el formato del RUT (ej: 12345678-9 o 1234567-K)
                    if (!preg_match('/^\d{7,8}-[0-9Kk]{1}$/', $value)) {
                        $fail('El RUT no tiene un formato válido (ej: 12345678-9 o 1234567-K).');
                        return;
                    }

                    // Separar cuerpo y dígito verificador
                    list($body, $verifier) = explode('-', $value);

                    // Convertir el dígito verificador a mayúscula para consistencia
                    $cleanVerifier = strtoupper($verifier);

                    $sum = 0;
                    $multiplier = 2;

                    // Calcular la suma ponderada del cuerpo del RUT
                    for ($i = strlen($body) - 1; $i >= 0; $i--) {
                        $sum += (int)$body[$i] * $multiplier;
                        $multiplier = ($multiplier === 7) ? 2 : $multiplier + 1;
                    }

                    // Calcular el dígito verificador esperado
                    $mod = 11 - ($sum % 11);
                    $expectedVerifier = '';

                    if ($mod === 11) {
                        $expectedVerifier = '0';
                    } elseif ($mod === 10) {
                        $expectedVerifier = 'K';
                    } else {
                        $expectedVerifier = (string)$mod;
                    }

                    // Comparar el dígito verificador calculado con el proporcionado
                    if ($cleanVerifier !== $expectedVerifier) {
                        $fail('El RUT ingresado no es válido.');
                    }
                },
            ],
            'region_id'   => 'required|integer|exists:regions,id',
            'commune_id'  => 'required|integer|exists:communes,id',
            'address'     => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'nullable|email|max:255',
            'start_date'    => 'required|date_format:Y-m-d',
            'state_id'  => 'required|integer|exists:states,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $institution = Institution::create([
            'name'        => $request->name,
            'rut'         => $request->rut,
            'region_id'   => $request->region_id,
            'commune_id'  => $request->commune_id,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'start_date'  => $request->start_date,
            'state_id'  => $request->state_id ?? 1,
            'created_by'  => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'data'    => $institution
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
