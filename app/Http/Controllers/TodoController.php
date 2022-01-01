<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    function index() {
        $todos = DB::select('SELECT * FROM todos');
        return view('todo', ['todo' => $todos]);
    }

    function add(Request $request) {
        // dd($request->todo_text); // Debuck Input
        $request->validate([
            'doto_text' => 'required|unique:todo_text'
        ]);
    }
}
