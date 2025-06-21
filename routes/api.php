<?php

use App\Http\Controllers\Api\ApiInstitutionController;
use App\Http\Middleware\LogDebugMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/institutions', [ApiInstitutionController::class, 'index']);
    Route::post('/institutions', [ApiInstitutionController::class, 'store'])->middleware(LogDebugMiddleware::class);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $user = $request->user();
    if (!$user || !$user->currentAccessToken()) {
        return response()->json(['message' => 'No autenticado o token inválido'], 401);
    }
    $user->currentAccessToken()->delete();
    return response()->json(['message' => 'Sesión cerrada correctamente']);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    $user = Auth::user();

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken,
        'user' => $user
    ]);
});
