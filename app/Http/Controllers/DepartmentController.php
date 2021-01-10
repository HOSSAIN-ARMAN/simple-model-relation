<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        return view('admin.department.index',[
            'department'  => new Department()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(DepartmentRequest $request)
    {

        Department::create($request->all());
        return redirect()->route('department.show') ->with('message', 'Department Create successfully!');
    }


    public function show(Department $department)
    {
        return view('admin.department.mange',[
            'departments' => $department->paginate(10)
        ]);
    }


    public function edit($id=null)
    {
        return view('admin.department.edit', [
            'department' => Department::find($id)
        ]);
    }


    public function update(DepartmentRequest $request)
    {
        $department = $request->except('_token', 'id');
        Department::findOrFail($request->get('id'))->update($department);
        return redirect()->route('department.show') ->with('message', 'Update successfully Done!');
    }


    public function destroy(Request $request)
    {
        Department::find($request->id)->delete();
        return redirect()->route('department.show');
    }
}
