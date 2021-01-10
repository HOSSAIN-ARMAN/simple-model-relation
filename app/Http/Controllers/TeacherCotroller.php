<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Department;
use App\Models\Student;
use App\Models\StudentTeacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use View;

class TeacherCotroller extends Controller
{
    public function __construct()
    {
        View::share([
            'departments' => Department::all(),
        ]);
    }

    public function index()
    {
        return view('admin.teacher.index', [
            'teacher' => new Teacher()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create($request->all());
        $students = Student::all();
        foreach ($students as $student){
            $data['teacher_id'] = $teacher->id;
            $data['student_id'] = $student->id;
            $data['status'] = 0;
            StudentTeacher::insert($data);
        }
        return redirect()->route('teacher.show')->with('message', 'Teacher Added Successfully');
    }


    public function show()
    {
        return view('admin.teacher.manage', [
            'teachers' => Teacher::with('department')->where('publication_status', 1)->paginate(10)
        ]);
    }


    public function edit($id=null)
    {
        return view('admin.teacher.edit', [
            'teacher' => Teacher::find($id),
        ]);
    }


    public function update(TeacherRequest $request, Teacher $teacher)
    {

        $teacher = $request->except('_token', 'id');
        Teacher::findOrFail($request->get('id'))->update($teacher);
        return redirect()->route('teacher.show')->with('message', 'Teacher-Info Update Successfully');
    }


    public function destroy(Request $request)
    {
        Teacher::find($request->id)->delete();
        return redirect()->route('teacher.show');
    }
}
