<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Institution;
use App\Models\Region;
use App\Models\School;
use App\Models\SchoolUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('User/Index', [
            'regions' => Region::with('province.comuna')->get(),
            'users' => User::with('creator')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create', [
            'schools' => School::with('institution')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = Auth::user();

            $newUser = User::create([
                'name' => $request->input('name'),
                'surnames' => $request->input('surnames'),
                'rut' => $request->input('rut'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => Hash::make('@contraseñaSegura1'),
                'created_by' => $user->id,
            ]);

            $newUser->schools()->sync($request->input('schools_ids', []));
        });

        return redirect()->route('user.index')->with('success', 'Usuario creado exitosamente.');
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
        //
    }
}
