<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function getUsers() {
        $users = User::all();
        return response()->json($users);
    }

    public function getUser($id) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function registerReceptionist(Request $request) {
        $validatedUser = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        User::create([
            'name' => $validatedUser['first_name'] . ' ' . $validatedUser['last_name'],
            'email' => $validatedUser['email'],
            'password' => Hash::make($validatedUser['password']),
            'role' => $validatedUser['role']
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User has been registered',
        ], 200);
    }

    public function registerUser(Request $request) {
        $validatedUser = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'emergency_contact' => ['required'],
            'medical_history' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        User::create([
            'name' => $validatedUser['first_name'] . ' ' . $validatedUser['last_name'],
            'email' => $validatedUser['email'],
            'password' => Hash::make($validatedUser['password']),
            'role' => $validatedUser['role']
        ]);

        Patient::create([
            'first_name' => $validatedUser['first_name'],
            'last_name' => $validatedUser['last_name'],
            'date_of_birth' => $validatedUser['date_of_birth'],
            'gender' => $validatedUser['gender'],
            'address' => $validatedUser['address'],
            'phone' => $validatedUser['phone'],
            'email' => $validatedUser['email'],
            'emergency_contact' => $validatedUser['emergency_contact'],
            'medical_history' => $validatedUser['medical_history']
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User has been registered',
        ], 200);
    }

    public function updateUser(Request $request, $id) {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required']
        ]);

        $user = User::find($id);
        $user->update($data);

        return response()->json($user, 200);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        return response()->json($user, 200);
    }

    public function loginUser(Request $request) {
        $validatedUser = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $validatedUser['email'])->first();

        if (!($user && password_verify($validatedUser['password'], $user->password))) {
            return response()->json([
                'status' => false,
                'message' => 'email or password did not match'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'user' => $user
        ]);
    }
}
