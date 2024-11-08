<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilizadorController extends Controller
{
    public function index()
    {
        return view('public/signup');
    }
    public function store(Request $request)
    {
        dd($request);
    }
}
