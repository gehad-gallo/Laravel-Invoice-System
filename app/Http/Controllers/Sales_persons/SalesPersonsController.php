<?php

namespace App\Http\Controllers\Sales_persons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesPersonsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sales');
    }


    public function index()
    {
        return view('home.Employee');
    }

}
