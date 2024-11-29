<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\Usuario;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd('okay');
    }
}
