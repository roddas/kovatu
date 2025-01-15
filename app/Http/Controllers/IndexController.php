<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuotesModel;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
      
        Schedule::call(function () {
            $proverbio = QuotesModel::inRandomOrder()->first();
        })->daily();

        $proverbio = Cache::remember('daily_proverbio', 1440, function () {
            return QuotesModel::inRandomOrder()->first(['proverbio', 'interpretacao', 'lingua']);
        });

        return view('landing', ['proverbio' => $proverbio]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        $rules = [
            'password' => ['required'],
            'email' => [
                'email',
                'max:255',
                'lowercase',
                'email:rfc',
            ]
        ];

        $error_messages = [
            'password.required' => 'Por favor, insira uma senha.',
            'email.string' => 'O e-mail deve ser um texto válido.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.email.rfc' => 'O formato do e-mail não está correto.',
        ];

        $fields = $request->validate($rules, $error_messages);
        if (Auth::attempt($fields, $request->remember)) {
            return redirect('/home');
        }
        return back()->withErrors(['ERROR_AUTH' => 'Erro na autenticação.']);
    }
}
