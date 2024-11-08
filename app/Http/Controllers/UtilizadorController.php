<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Utilizador;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public/signup');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'min:3', 'max:45'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'email' => [
                'string',
                'email',
                'max:255',
                'lowercase',
                'email:rfc',
            ]
        ];



        $error_messages = [
            'first_name.required' => 'Por favor, preencha o nome.',
            'first_name.string' => 'O nome deve ser apenas letras.',
            'first_name.min' => 'O nome precisa ter pelo menos 3 letras.',
            'first_name.max' => 'O nome não pode ter mais de 45 letras.',
            'last_name.required' => 'Por favor, preencha o sobrenome.',
            'last_name.string' => 'O sobrenome deve ser apenas letras.',
            'last_name.min' => 'O sobrenome precisa ter pelo menos 3 letras.',
            'last_name.max' => 'O sobrenome não pode ter mais de 100 letras.',
            'foto.string' => 'A foto deve ser um texto válido.',
            'foto.min' => 'O texto da foto precisa ter pelo menos 4 caracteres.',
            'foto.max' => 'O texto da foto não pode ter mais de 255 caracteres.',
            'password.required' => 'Por favor, crie uma senha.',
            'password.confirmed' => 'As senhas não são iguais.',
            'password.string' => 'A senha deve ser apenas letras e números.',
            'password.min' => 'A senha precisa ter pelo menos 8 caracteres.',
            'password.max' => 'A senha não pode ter mais de 255 caracteres.',
            'email.string' => 'O e-mail deve ser um texto válido.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.email.rfc' => 'O formato do e-mail não está correto.',
        ];

        $validated = $request->validate($rules, $error_messages);
        dd($validated);



        //event(new Registered($new_user));
        // Configurar mailcatcher 
    }
}
