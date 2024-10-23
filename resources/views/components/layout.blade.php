<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- SLOW INTERNET, AFTER RESOLVE THIS PROBLEM, CHANGE BACK --}}
    {{-- <script src="https://unpkg.com/alpinejs" defer></script> --}}
    <script src="https://unpkg.com/alpinejs@3.14.3/dist/cdn.min.js" defer></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.svg') }}">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class=" py-4 mx-auto flex justify-center">
        <a href="{{ route('index'); }}"><img src="{{ asset('logo.svg') }}" alt=""></a>
    </div>
    <div class="max-w-screen-xl mx-auto">
        <section class=" ">
            {{ $slot }}
        </section>
    </div>
    <x-base.footer></x-base.footer>
</body>

</html> 
