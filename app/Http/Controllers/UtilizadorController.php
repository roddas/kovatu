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
            'nome' => ['required', 'string', 'min:3', 'max:45', 'trim'],
            'sobrenome' => ['required', 'string', 'min:3', 'max:100', 'trim'],
            'foto' => ['nullable', 'string', 'min:4', 'max:255'],
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
            'nome.required' => 'Por favor, preencha o nome.',
            'nome.string' => 'O nome deve ser apenas letras.',
            'nome.min' => 'O nome precisa ter pelo menos 3 letras.',
            'nome.max' => 'O nome não pode ter mais de 45 letras.',
            'sobrenome.required' => 'Por favor, preencha o sobrenome.',
            'sobrenome.string' => 'O sobrenome deve ser apenas letras.',
            'sobrenome.min' => 'O sobrenome precisa ter pelo menos 3 letras.',
            'sobrenome.max' => 'O sobrenome não pode ter mais de 100 letras.',
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

        $request->validate($rules, $error_messages);
        $nome = Str::ucfirst($request->nome);
        $sobrenome = Str::of($request->sobrenome)->headline();
        $email = Str::of($request->email)->lower();

        $new_user = Utilizador::create([
            'nome' => $nome,
            'sobrenome' =>
            $sobrenome,
            'email' => $email,
            'password' => $request->password,
        ]);

        //event(new Registered($new_user));
        // Configurar mailcatcher 
    }
}
