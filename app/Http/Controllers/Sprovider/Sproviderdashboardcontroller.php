<?php

namespace App\Http\Controllers\Sprovider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sproviderdashboardcontroller extends Controller
{
    public function Index()
    {
        return view('sprovider.dashboard');
    }
}