<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blank layout</title>
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    @vite(['resources/scss/app.scss','resources/js/app.js','public/assets/vendor/ckeditor5/sample/styles.css','public/assets/vendor/ckeditor5/build/translations/es.js'])
    @stack('blank-styles')
    @livewireStyles
</head>
<body>
    <div class="m-0 card overflow-hidden">
        {{ $slot }}
    </div>
</body>
@livewireScripts
@stack('blank-scripts')
</html>
