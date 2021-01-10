<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\StudentTeacher;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.index',[
            'student' => new Student()
        ]);
    }
    public function store(StudentRequest $request) {
        $student = Student::create($request->all());
        $teachers = Teacher::all();
        foreach ($teachers as $teacher){
            $data['teacher_id'] = $teacher->id;
            $data['student_id'] = $student->id;
            $data['status'] = 0;
            StudentTeacher::insert($data);
        }
        return redirect()->route('student.show')->with('message', 'Student Added Successfully');
    }

    public function show(){
        return view('admin.student.show', [
            'students' => Student::all()
        ]);
    }
    public function edit($id=null){
      $student = Student::find($id);
      return view('admin.student.edit', compact('student'));
    }
    public function update(StudentRequest $request){
        $student = $request->except('_token', 'id');
        Student::findOrFail($request->get('id'))->update($student);
        return redirect()->route('student.show')->with('message', 'Student Info Update Successfully');
    }
    public function destroy(Request $request){
        Student::findOrFail($request->id)->delete();
        return redirect()->route('student.show');
    }
    public function assignTeacher($id=null) {

//        $teachers = DB::table('student_teachers')->where('student_id', $id)
//            ->join('teachers', 'student_teachers.teacher_id', '=', 'teachers.id')
//            ->select('student_teachers.*', 'teachers.name')->get();
//        dd($teachers);

        $teachers = StudentTeacher::with('teacher')->where('student_id', $id)->get();

        return view('admin.student.teacher-assign', compact('teachers'));
    }
    public function confirmTeacher(Request $request) {
      $studentTeacher = StudentTeacher::where('id', $request->id)->first();
        if ($studentTeacher->status == 0){
            StudentTeacher::findOrFail($request->id)->update([
                'status' => 1
            ]);
        }else{
            StudentTeacher::findOrFail($request->id)->update([
                'status' => 0
            ]);
        }

        return response()->json(['code'=>200, 'message'=> 'ok', 'data' =>$studentTeacher ], 200);

    }



//    public function register(StudentRequest $request){
//
//        $student = Student::create([
//            'name' => $request->name,
//            'email' => $request->email,
//        ]);
//
//        $teachers = Teacher::all();
//
//        foreach ($teachers as $teacher){
//            $data['teacher_id'] = $teacher->id;
//            $data['student_id'] = $student->id;
//            $data['status'] = 0;
//            StudentTeacher::create($data);
//        }
//
//        return redirect()->back();
//    }
//    public function login(){
//        return view('admin.student.login');
//    }
//
//    public function authenticate(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            return redirect()->route('admin.student.dashboard');
//        }
//
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
//    }
//    public function dashboard(){
//        return view('admin.dashboard');
//        return redirect()->route('department.show');
//    }
//

//
//    public function addTeacherForStudent(){
//        return view('admin.student.add-teacher', [
//            'teachers'=> Teacher::all()
//        ]);
//    }
//
//    public function assignTeacher(Request $request) {
//        if (count($request->teacher_id) > 0){
//            foreach ($request->teacher_id as $key=>$value){
//                $assignTeacher = array(
//                    'teacher_id' => $request->teacher_id[$key]
//                );
//                DB::table('student_teacher')->insert($assignTeacher);
//            }
//        }
//        return redirect()->back();
//    }
}
