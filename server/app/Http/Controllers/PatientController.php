<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller {

    public function getPatients() {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function getPatient($id) {
        $patient = Patient::find($id);
        return response()->json($patient);
    }

    public function updatePatient(Request $request, $id) {
        $validatedUser = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'emergency_contact' => ['required'],
            'medical_history' => ['required'],
        ]);

        $patient = Patient::find($id);
        $patient->update($validatedUser);

        return response()->json($patient, 200);
    }

    public function deletePatient($id) {
        $patient = Patient::find($id);
        $patient->delete();

        return response()->json($patient, 200);
    }
}
