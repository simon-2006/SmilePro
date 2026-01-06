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
        //
        $user = $this->userModel->sp_GetUserById($id);


        $userroles = $this->userModel->sp_GetAllUsersRoles();

        return view('praktijkmanagement.edit', [
            'title' => 'wijzig de gebruikersrol',
            'user' => $user,
            'userroles' => $userroles
        ]);
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
