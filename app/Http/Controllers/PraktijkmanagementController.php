<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PraktijkmanagementController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home'        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // Fetch user and ensure we pass a single object (DB::select returns an array)
        $userResult = $this->userModel->sp_GetUserById($id);
        $user = collect($userResult)->first();

        // Normalize roles to objects with a 'name' property for the view
        $rolesResult = $this->userModel->sp_GetAllUsersRoles();
        $roles = collect($rolesResult)->map(function ($r) {
            return (object) ['name' => $r->rolename];
        });

        if (! $user) {
            return redirect()->route('praktijkmanagement.usersroles')
                ->with('error', 'Gebruiker niet gevonden.');
        }

        return view('praktijkmanagement.edit', [
            'title' => 'wijzig de gebruikersrol',
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rolename' => ['required', 'string', 'max:50']
        ]);

        $affected = $this->userModel->sp_UpdateUser(
            $id,
            $validated['name'],
            $validated['email'],
            $validated['rolename']
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function manageUsersroles()
{
    $users = User::query()
        ->select('id', 'name', 'email', 'rolename')  // kolomnamen in jouw users-tabel
        ->get();

    return view('praktijkmanagement.usersroles', [
        'title' => 'Gebruikersrollen',
        'users' => $users,
    ]);
}

}
