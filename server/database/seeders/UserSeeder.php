<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() {
        // Seed Users
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'password' => Hash::make('password1'),
                'role' => 'user'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'password' => Hash::make('password2'),
                'role' => 'user'
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => Hash::make('password3'),
                'role' => 'user'
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => Hash::make('password4'),
                'role' => 'user'
            ],
            [
                'name' => 'William Brown',
                'email' => 'william.brown@example.com',
                'password' => Hash::make('password5'),
                'role' => 'user'
            ],
        ];

        DB::table('users')->insert($users);

        // Seed Patients
        $patients = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '1990-01-01',
                'gender' => 'Male',
                'address' => '123 Main St Apt 1',
                'phone' => '1233211',
                'email' => 'john.doe@example.com',
                'emergency_contact' => '9863211',
                'medical_history' => 'No significant medical history.'
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '1985-05-05',
                'gender' => 'Female',
                'address' => '456 Elm St Apt 2',
                'phone' => '1233212',
                'email' => 'jane.smith@example.com',
                'emergency_contact' => '9863212',
                'medical_history' => 'Allergic to penicillin.'
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'date_of_birth' => '1978-09-09',
                'gender' => 'Male',
                'address' => '789 Oak St Apt 3',
                'phone' => '1233213',
                'email' => 'michael.johnson@example.com',
                'emergency_contact' => '9863213',
                'medical_history' => 'Diabetic.'
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'date_of_birth' => '1992-03-03',
                'gender' => 'Female',
                'address' => '101 Pine St Apt 4',
                'phone' => '1233214',
                'email' => 'emily.davis@example.com',
                'emergency_contact' => '9863214',
                'medical_history' => 'Asthma.'
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Brown',
                'date_of_birth' => '1980-11-11',
                'gender' => 'Male',
                'address' => '202 Maple St Apt 5',
                'phone' => '1233215',
                'email' => 'william.brown@example.com',
                'emergency_contact' => '9863215',
                'medical_history' => 'Hypertension.'
            ],
        ];

        DB::table('patients')->insert($patients);

        // Seed Doctors
        $doctors = [
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'specialization' => 'Cardiology',
                'licensed_number' => '123451',
                'phone' => '551231',
                'email' => 'alice.smith@example.com'
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Jones',
                'specialization' => 'Neurology',
                'licensed_number' => '123452',
                'phone' => '551232',
                'email' => 'robert.jones@example.com'
            ],
            [
                'first_name' => 'Laura',
                'last_name' => 'Miller',
                'specialization' => 'Pediatrics',
                'licensed_number' => '123453',
                'phone' => '551233',
                'email' => 'laura.miller@example.com'
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Wilson',
                'specialization' => 'Dermatology',
                'licensed_number' => '123454',
                'phone' => '551234',
                'email' => 'james.wilson@example.com'
            ],
            [
                'first_name' => 'Jessica',
                'last_name' => 'Garcia',
                'specialization' => 'Orthopedics',
                'licensed_number' => '123455',
                'phone' => '551235',
                'email' => 'jessica.garcia@example.com'
            ],
        ];

        DB::table('doctors')->insert($doctors);

        // Seed Appointments
        $appointments = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'appointment_date' => now()->addDays(1),
                'status' => 'Scheduled',
                'reason' => 'Routine check-up'
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'appointment_date' => now()->addDays(2),
                'status' => 'Scheduled',
                'reason' => 'Follow-up'
            ],
            [
                'patient_id' => 3,
                'doctor_id' => 3,
                'appointment_date' => now()->addDays(3),
                'status' => 'Scheduled',
                'reason' => 'Child wellness check'
            ],
            [
                'patient_id' => 4,
                'doctor_id' => 4,
                'appointment_date' => now()->addDays(4),
                'status' => 'Scheduled',
                'reason' => 'Skin rash'
            ],
            [
                'patient_id' => 5,
                'doctor_id' => 5,
                'appointment_date' => now()->addDays(5),
                'status' => 'Scheduled',
                'reason' => 'Back pain'
            ],
        ];

        DB::table('appointments')->insert($appointments);

        // Seed Medical Records
        $medicalRecords = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'visit_date' => '2024-01-10',
                'diagnosis' => 'Hypertension',
                'treatment' => 'Medication and lifestyle changes',
                'notes' => 'Patient needs to follow up in 3 months.'
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'visit_date' => '2024-01-11',
                'diagnosis' => 'Migraine',
                'treatment' => 'Pain management and lifestyle changes',
                'notes' => 'Patient needs to avoid stress and follow up in 6 months.'
            ],
            [
                'patient_id' => 3,
                'doctor_id' => 3,
                'visit_date' => '2024-01-12',
                'diagnosis' => 'Childhood asthma',
                'treatment' => 'Inhalers and avoidance of allergens',
                'notes' => 'Follow up in 3 months.'
            ],
            [
                'patient_id' => 4,
                'doctor_id' => 4,
                'visit_date' => '2024-01-13',
                'diagnosis' => 'Eczema',
                'treatment' => 'Topical steroids and moisturizers',
                'notes' => 'Monitor skin condition and follow up in 1 month.'
            ],
            [
                'patient_id' => 5,
                'doctor_id' => 5,
                'visit_date' => '2024-01-14',
                'diagnosis' => 'Lower back pain',
                'treatment' => 'Physical therapy and pain management',
                'notes' => 'Follow up in 1 month.'
            ],
        ];

        DB::table('medical_records')->insert($medicalRecords);
    }
}
