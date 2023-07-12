<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        @vite(['resources/scss/app.scss','public/css/app.css','public/js/app.js','resources/js/app.js'])
        @stack('admin-styles')
        @livewireStyles
    </head>
    <body>
        @include('layouts.admin.sidebar')
        <main>
            {{ $slot }}
        </main>
    </body>
    <footer>
        @livewireScripts
        @stack('admin-scripts')
    </footer>
</html>
