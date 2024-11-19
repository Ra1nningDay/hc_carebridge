<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Fetch Users
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
            })
            ->paginate(6);

        // Fetch Roles and User Roles
        $roles = Role::all();
        $userRoles = RoleUser::all();

        return view('dashboard.user-management', compact('users', 'roles', 'userRoles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:Admin,User',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('dashboard.user-management')->with('status', 'User role updated successfully!');
    }
}
