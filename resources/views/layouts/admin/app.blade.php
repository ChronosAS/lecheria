<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
        @vite(['resources/scss/app.scss','public/css/app.css','public/js/app.js','resources/js/app.js'])
        @stack('admin-styles')
        @livewireStyles
    </head>
    <body>
        <!-- Nav Sidebar-->
        <div class="float-start d-none d-lg-block d-sm-block">
            <x-admin.navigation/>
        </div>
        <!-- Nav Sidebar Mobile-->
        <div class="d-block d-sm-none">
            <x-admin.navigation-mobile/>
        </div>
        <div>
            {{ $slot }}
        </div>
    </body>
    <footer>
        @livewireScripts
        @stack('admin-scripts')
    </footer>
</html>
