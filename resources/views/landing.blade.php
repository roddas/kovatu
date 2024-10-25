<x-layout>
    <h1 class="text-primaryBlue title my-8 literata-medium ">Um lugar para partilharmos conhecimentos e entendermos melhor as nossas
        raízes.
    </h1>
    <section class="md:flex md:justify-around w-full mt-20 ">
        <form action="{{ route('index') }}" method="post" class="p-8 md:w-[50%]">
            @csrf
            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="email@domain.com" required>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="********************" required>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember checkbox --}}
            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="ml-2">Lembrar-me</label>
            </div>
            {{-- Submit button --}}
            <button type="submit" class="">Entrar</button>
            <p class="my-4">
                <a href="#" class="link my-2">Esqueceu a senha ?</a>
            </p>
            <a href="#" class="link mb-4">Criar uma conta</a>
        </form>

        {{-- Quotes side --}}
        <section class="my-auto">
            <img src="{{ asset('images/quotes.svg') }}" width="56" alt="">
            <div class="flex justify-center text-center">
                <p class="text-5xl literata-thin-italic text-primaryBlue w-[80%] text-justify">Yamwangana ixi kuswa</p>
            </div>
            <img src="{{ asset('images/quotes.svg') }}" width="56" alt=""
                class="rotate-180 float-right mb-5">
            <p class=" text-base text-primaryBlue mt-12 ml-5">
                - Ditado popular Cokwé
            </p>
        </section>
    </section>
</x-layout>
