<x-layout image="bubu">
    <x-base.title title="Crie uma conta" />
    <form action="{{ route('signup') }}" method="post" class="p-8 md:w-[50%] mx-auto">
        @csrf

        {{-- First Name --}}
        <div class="mb-4">
            <label for="nome">Primeiro Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex. Cykolomwenyo"
                maxlength="30" required>
            @error('nome')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Last Name --}}
        <div class="mb-4">
            <label for="sobrenome">Último Nome</label>
            <input type="text" name="sobrenome" id="sobrenome" value="{{ old('sobrenome') }}" placeholder="Ex. Mwana"
                maxlength="30" required>
            @error('sobrenome')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                placeholder="Ex. MwanaCykolomwenyo@dominio.com" maxlength="250" required>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="********************" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password Confirmation --}}
        <div class="mb-4">
            <label for="password_confirmation">Confirme a senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="********************" required>
        </div>

        {{-- Submit button --}}
        <button type="submit" class="">Criar uma nova conta</button>
        @if (session('created'))
            <p class="text-green-900 my-2 text-base font-bold">{{ session('created') }}</p>
        @endif
    </form>
    <x-base.home />
</x-layout>
