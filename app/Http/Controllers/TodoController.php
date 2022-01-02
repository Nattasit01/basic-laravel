<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Todo;

class TodoController extends Controller
{
    function index() {
        $todos = DB::table('todos')->get();
        return view('todo.dashboard', ['todoList' => $todos]);
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
        // Insert Data To Do
        $todo = new Todo();
        $todo->todo_txt = $request->todo_text;
        $todo->save();
        return redirect()->back();
    }

    function update(Request $request) {
        return view('todo.update', ['id' => $request->id, 'todo_text' => $request->todo_text]);
    }

    function delete(Request $request) {
        $request->validate(['id' => 'required'], ['id.required' => 'กรุณาระบุ Id']);

        $todo = new Todo();
        $todo->
    }
}
