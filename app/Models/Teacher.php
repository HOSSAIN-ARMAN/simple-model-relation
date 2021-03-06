<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function students(){
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function teachers(){
        return $this->hasMany(StudentTeacher::class);
    }

}
