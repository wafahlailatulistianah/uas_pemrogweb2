<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // will show dashboard page for customer
    public function index()
    {
        return view('dashboard.index');
    }
}
