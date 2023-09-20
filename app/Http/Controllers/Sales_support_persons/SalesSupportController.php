<?php

namespace App\Http\Controllers\Sales_support_persons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesSupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:support');
    }

    public function index()
    {
        return view('home.Employee');
    }
}
