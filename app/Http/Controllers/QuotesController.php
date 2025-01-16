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
        $quotes = QuotesModel::select(['id_proverbio', 'proverbio', 'lingua'])->latest()->paginate(10);
        $languages = array_unique(QuotesModel::pluck('lingua')->toArray());
        return view('home.quotes', [ 'linguas' => $languages, 'proverbios' => $quotes]);
    }
    public function viewQuote($idProverbio)
    {
        $id = $idProverbio;
        $quotes = QuotesModel::find($id);
        return view('home.view_quote', [ 'proverbio' => $quotes, 'autor' => $quotes->autor]);
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
