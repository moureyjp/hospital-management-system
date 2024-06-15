<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller {

    public function getDoctors() {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function getDoctor($id) {
        $doctor = Doctor::find($id);
        return response()->json($doctor);
    }


    public function registerDoctor(Request $request) {
        $validatedUser = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'specialization' => ['required'],
            'licensed_number' => ['required'],
            'phone' => ['required'],
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

        Doctor::create([
            'first_name' => $validatedUser['first_name'],
            'last_name' => $validatedUser['last_name'],
            'specialization' => $validatedUser['specialization'],
            'licensed_number' => $validatedUser['licensed_number'],
            'phone' => $validatedUser['phone'],
            'email' => $validatedUser['email'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User has been registered',
        ], 200);
    }

    public function updateDoctor(Request $request, $id) {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'specialization' => ['required'],
            'licensed_number' => ['required'],
            'phone' => ['required'],
        ]);

        $doctor = Doctor::find($id);
        $doctor->update($data);

        return response()->json($doctor, 200);
    }

    public function deleteDoctor($id) {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return response()->json($doctor, 200);
    }
}
