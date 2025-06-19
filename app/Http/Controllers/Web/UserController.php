<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Region;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create', [
            'regions' => Region::with('province.comuna')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = Auth::user();

            $newUser = User::create([
                'name' => $request->input('name'),
                'surnames' => $request->input('surnames'),
                'rut' => $request->input('rut'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => Hash::make('@contraseñaSegura1'), // contraseña por default para usuario
                'created_by' => $user->id,
            ]);
            foreach ($request->input('school') as $school) { //recibimos la lista de colegios
                 $school_user = SchoolUser::Create([
                    'user_id'=> $newUser->id,
                    'school_id'=> $school->id,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            error_log($th);
            Log::error($th);
        }
        
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
