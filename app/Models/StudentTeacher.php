<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTeacher extends Model
{
    use HasFactory;
    protected $table = 'student_teachers';
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
