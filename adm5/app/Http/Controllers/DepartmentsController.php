<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    //
    public function allDepartments()
    {
        $departments= Department::all();
        return view('Departments.index')->with('departments', $departments);
    }

    //create new department
    public function createDepartment()
    {
        return view('Departments.create');
    }

    //update departments
    public function editDepartments($id)
    {
        $department= Department::find($id);
        return view('Departments.edit')->with('department', $department);
    }

    public function storeDepartments(Request $request)
    {
        $request->validate([
            'Department_name'=>'required|unique:departrments',
            'Department_description'=>'required'
        ]);

        $department= new Department();
        $department->Department_name= $request->input('Department_name');
        $department->Department_description= $request->input('Department_description');
        $department->save();
        return redirect()->route('allDepartments')->with('success', 'Department created successfully');
    }

    //update departments
    public function updateDepartments(Request $request, $id)
    {
        $request->validate([
            'Department_name'=>'required',
            'Department_description'=>'required'
        ]);

        $department= Department::find($id);
        $department->Department_name= $request->input('Department_name');
        $department->Department_description= $request->input('Department_description');
        $department->save();

        // $post= Post::where('id', $department->id)->update([
        //     'department'=>$request->input('department'),
        // ]);

        return redirect()->route('allDepartments')->with('success', 'Department updated successfully');

    }

    //delete department
    public function deleteDepartments($id)
    {
        $department= Department::find($id);
        $department->delete();
        return redirect()->route('allDepartments')->with('success', 'Department deleted successfully');

    }
}
