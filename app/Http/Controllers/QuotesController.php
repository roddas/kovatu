<?php

namespace App\Http\Controllers;

use App\Models\QuotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        return view('home.quotes', ['linguas' => $languages, 'proverbios' => $quotes]);
    }
    public function getByLanguage(Request $request)
    {
        $rules = [
            'language' => ['required', 'string', 'min:3', 'max:100'],
        ];

        $validator = Validator::make($request->post(), $rules);
        if ($validator->fails()) {
            return view('error.404');
        }
        $language = $validator->validated()['language'];
        $quotes = QuotesModel::select(['id_proverbio', 'proverbio', 'lingua'],)->where('lingua', $language)->paginate(10)->appends($request->except('page'));;
        $languages = array_unique(QuotesModel::pluck('lingua')->toArray());
        return view('home.quotes', ['linguas' => $languages, 'selected' => $language, 'proverbios' => $quotes]);
    }
    public function viewQuote($idProverbio)
    {
        $id = $idProverbio;
        $quotes = QuotesModel::find($id);

        if ($quotes) {
            return view('home.view_quote', ['proverbio' => $quotes, 'autor' => $quotes->autor]);
        }
        return view('error.404');
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
