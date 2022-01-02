<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

// use App\Models\Todo;

class TodoController extends Controller
{
    function index() {
        $todos = DB::table('todos')->where('delete_dtm', NULL)->get();
        return view('todo.index', ['todoList' => $todos]);
    }

    function store(Request $request) {
        // dd($request->todo_text); // Debuck Input
        $request->validate(
            [
                'todo_text' => 'required|max:100'
            ],
            [
                'todo_text.required' => 'กรุณาระบุข้อมูล',
                'todo_text.max' => 'ระบุข้อมูลได้ไม่เกิน 100 ตัวอักษร'
            ]
        );

        // Insert Statement
        $insertArray = array('todo_txt' => $request->todo_text, 'created_dtm' => Carbon::now());
        $res_insertTodo = DB::table('todos')->insert($insertArray);
        if ($res_insertTodo !== FALSE) {
            return redirect()->back();
        }
        else {
            return redirect()->back()->with('status', 'บันทึกข้อมูลไม่สำเร็จ!');
        }
    }

    function updateView($id) {
        $todo = DB::table('todos')->where('delete_dtm', NULL)->where('id', $id)->get()->first();
        return view('todo.update', ['todo' => $todo]);
    }

    function actionUpdate(Request $request) {
        $request->validate(
            [
                'id' => 'required',
                'todo_text' => 'required|max:100'
            ],
            [
                'id.required' => 'ไม่พบข้อมูล',
                'todo_text.required' => 'กรุณาระบุข้อมูล',
                'todo_text.max' => 'ระบุข้อมูลได้ไม่เกิน 100 ตัวอักษร'
            ]
        );

        // Update Statement
        $updateArray= array('todo_txt' => $request->todo_text);
        $res_updateTodo = DB::table('todos')->where('id', $request->id)->update($updateArray);
        if ($res_updateTodo !== FALSE) {
            return redirect()->route('todo');
        }
        else {
            return redirect()->route('todo')->with('status', 'บันทึกข้อมูลไม่สำเร็จ!');
        }
    }

    function delete($id) {
        if (empty($id)) {
            return redirect()->route('todo')->with('status', 'ดำเนินการไม่สำเร็จ.!');
        }
        else {
            $deleteArray= array('delete_dtm' => Carbon::now());
            $res_DeleteTodo = DB::table('todos')->where('id', $id)->update($deleteArray);
            if ($res_DeleteTodo !== FALSE) {
                return redirect()->route('todo');
            }
            else {
                return redirect()->route('todo')->with('status', 'ดำเนินการไม่สำเร็จ.!');
            }
        }
    }
}
