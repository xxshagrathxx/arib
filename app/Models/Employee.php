<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'parent_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
