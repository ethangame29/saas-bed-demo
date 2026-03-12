<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return List of Users.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created User.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return response()->json($user, 201);
    }

    /**
     * Return the specified User.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified User.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        return response()->json($user,201);
    }

    /**
     * Remove the specified User.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
