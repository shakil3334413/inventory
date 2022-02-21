<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'salary',
        'address',
        'photo',
        'nid',
        'join_date',
    ];

    public function salary()
    {
        return $this->hasMany(Salary::class,'employee_id','id');
    }

}
