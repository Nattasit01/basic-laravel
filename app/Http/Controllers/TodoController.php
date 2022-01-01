<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    function index() {
        $todos = DB::select('SELECT * FROM todo');
        return view('todo', ['todo' => $todos]);
    }
}
