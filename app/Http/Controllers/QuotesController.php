<?php

namespace App\Http\Controllers;

use App\Models\LinguaModel;
use App\Models\QuotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = QuotesModel::latest()->paginate(10);
        $languages = LinguaModel::all();
        return view('home.quotes', ['proverbios' => array(), 'linguas' => $languages, 'proverbios' => $quotes]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            return;
        }
    }
}
