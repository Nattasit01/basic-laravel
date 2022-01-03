<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    function index() {
        // $departments = Department::all();
        $departments = Department::paginate(3);
        return view('admin.department.index', compact('departments'));
    }

    function store(Request $request) {
        $validate = array(
            'department_name' => 'required|unique:departments,department_name|max:50',
        );
        $errorMessage = array(
            'department_name.required' => 'กรุณาระบุข้อมูล',
            'department_name.unique' => 'ตรวจพบข้อมูลซ้ำกันในระบบ',
            'department_name.max' => 'ระบุได้ไม่เกิน 50 ตัวอักษร',
        );
        $request->validate($validate, $errorMessage);

        $department = new Department();
        $department->user_id = Auth::user()->id;
        $department->department_name = $request->department_name;
        $department->save();

        return redirect()->back()->with('resMessage', 'บันทึกข้อมูลสำเร็จ');
    }
}
