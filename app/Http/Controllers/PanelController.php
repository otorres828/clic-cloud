<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        if(!auth()->check())
            return redirect('login');
        return view('panel');
    }
}
