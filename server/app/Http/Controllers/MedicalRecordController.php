<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller {
    public function getMedicalRecords() {
        $medicalRecords = MedicalRecord::all();
        return response()->json($medicalRecords);
    }

    public function getMedicalRecord($id) {
        $medicalRecord = MedicalRecord::find($id);
        return response()->json($medicalRecord);
    }

    public function registerMedicalRecord(Request $request) {
        $validatedData = $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'visit_date' => 'required|date',
            'diagnosis' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        // Create the medical record
        $medicalRecord = MedicalRecord::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medical record created successfully', 'data' => $medicalRecord], 201);
    }

    public function updateMedicalRecord(Request $request, $id) {
        // Validate the request
        $validatedData = $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'visit_date' => 'required|date',
            'diagnosis' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        // Find the medical record by ID
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Update the medical record
        $medicalRecord->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Medical record updated successfully', 'data' => $medicalRecord], 200);
    }

    public function deleteMedicalRecord($id) {
        // Find the medical record by ID
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Delete the medical record
        $medicalRecord->delete();

        // Return a success response
        return response()->json(['message' => 'Medical record deleted successfully'], 200);
    }
}
