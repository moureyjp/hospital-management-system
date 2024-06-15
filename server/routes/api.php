<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Users
Route::get("/users", [UserController::class, 'getUsers']);
Route::get("/users", [UserController::class, 'getUsers']);
Route::get("/users/{id}", [UserController::class, 'getUser']);
Route::post("/receptionist/register", [UserController::class, 'registerReceptionist']);
Route::post("/user/register", [UserController::class, 'registerUser']);
Route::post("/user/login", [UserController::class, 'loginUser']);
Route::put("/users/{id}", [UserController::class, 'updateUser']);
Route::delete("/user/{id}", [UserController::class, 'deleteUser']);

// Patients
Route::get("/patients", [PatientController::class, 'getPatients']);
Route::get("/patients/{id}", [PatientController::class, 'getPatient']);
Route::put("/patient/update/{id}", [PatientController::class, 'updatePatient']);
Route::delete("/patient/{id}", [PatientController::class, 'deletePatient']);

// Doctors
Route::get("/doctors", [DoctorController::class, 'getDoctors']);
Route::post("/doctor/register", [DoctorController::class, 'registerDoctor']);
Route::get("/doctor/{id}", [DoctorController::class, 'getDoctor']);
Route::put("/doctor/update/{id}", [DoctorController::class, 'updateDoctor']);
Route::delete("/doctor/{id}", [DoctorController::class, 'deleteDoctor']);

// Medical Records
Route::get("/medical-records", [MedicalRecordController::class, 'getMedicalRecords']);
Route::post("/medical-records/register", [MedicalRecordController::class, 'registerMedicalRecord']);
Route::get("/medical-record/{id}", [MedicalRecordController::class, 'getMedicalRecord']);
Route::put("/medical-record/{id}", [MedicalRecordController::class, 'updateMedicalRecord']);
Route::delete("/medical-record/{id}", [MedicalRecordController::class, 'deleteMedicalRecord']);

// Appointment
Route::get("/appointments", [AppointmentController::class, 'getAppointments']);
Route::get("/appointment/{id}", [AppointmentController::class, 'getAppointment']);
Route::post("/appointment/register", [AppointmentController::class, 'registerAppointment']);
Route::put("/appointment/update/{id}", [AppointmentController::class, 'updateAppointment']);
Route::delete("/appointment/{id}", [AppointmentController::class, 'deleteAppointment']);
