<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Project::factory()->count(50)->create();

//        Employee::create([
//            "empId" => "1",
//            "name" => "John",
//            "joiningDate" => "2023-01-01",
//            "designation" => "Developer",
//            "role" => "contract",
//            "email" => "john1@gmail.com"
//        ]);
//
//        Employee::create([
//            "empId" => "2",
//            "name" => "Dove",
//            "joiningDate" => "2023-01-01",
//            "designation" => "Tester",
//            "role" => "fulltime",
//            "email" => "dove@gmail.com"
//        ]);


    }
}
