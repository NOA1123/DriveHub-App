<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return new UserResource($user);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:10',
            'email' => 'required|email|max:100',
            'user_type' => 'required|string|max:50',
        ]);

        // hash password
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'data' => new UserResource($user)
        ], 201);
    }
    public function update(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }

    $validated = $request->validate([
        'username' => 'sometimes|required|string|max:50',
        'password' => 'sometimes|required|string|min:6',
        'phone' => 'sometimes|required|string|max:10',
        'email' => 'sometimes|required|email|max:100',
        'user_type' => 'sometimes|required|string|max:50',
    ]);

    // hash password only if provided
    if (isset($validated['password'])) {
        $validated['password'] = bcrypt($validated['password']);
    }

    $user->update($validated);

    return response()->json([
        'message' => 'User updated successfully',
        'data' => new UserResource($user)
    ]);
}
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
    
}
