<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EmployeeController extends Controller
{
    function index() {
        Paginator::useBootstrap();
        return view('employee.index');
    }
}
