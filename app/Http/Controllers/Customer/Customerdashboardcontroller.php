<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Customerdashboardcontroller extends Controller
{
    public function Index()
    {
        return view('customer.dashboard');
    }
}