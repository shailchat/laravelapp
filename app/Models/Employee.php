<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;


    public $fillable = ['name', 'empId', 'joiningDate', 'designation', 'role', 'email'];

    public function getDevelopers($designation){
        return $this->where('designation', $designation);
    }
}
