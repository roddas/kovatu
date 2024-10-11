<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.svg') }}">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class=" bg-red-200 py-4 mx-auto flex justify-center">
        <a href="{{ route('index'); }}"><img src="{{ asset('logo.svg') }}" alt=""></a>
    </div>
    <div class="max-w-screen-xl mx-auto">
        <section class=" bg-blue-400">
            {{ $slot }}
        </section>
        <footer class="bg-purple-500">footer</footer>
    </div>
</body>

</html>
