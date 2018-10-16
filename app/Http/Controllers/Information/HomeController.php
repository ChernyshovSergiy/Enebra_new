<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $status = 'vegas';
        return view('Information.index', compact('status'));
    }
}
