<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function index() {
        return view('admin.department.index');
    }

    function store(Request $request) {
        $validate = array(
            'department_name' => 'required|unique:departments,department_name|max:50',
        );
        $errorMessage = array(
            'department_name.required' => 'กรุณาระบุข้อมุล',
            'department_name.unique' => 'ตรวจพบข้อมูลซ้ำกันในระบบ',
            'department_name.max' => 'ระบุได้ไม่เกิน 50 ตัวอักษร',
        );
        $request->validate($validate, $errorMessage);
    }
}
