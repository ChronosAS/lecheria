<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
        @vite(['resources/scss/app.scss','resources/js/app.js','public/assets/vendor/ckeditor5/sample/styles.css'])
        @stack('admin-styles')
        @livewireStyles
        <style>
            html, body{
                height: 100%
            }
        </style>
    </head>
    <body>
        <div class="container-fluid p-0 d-flex h-100 position-fixed" x-data="{ offCanvasOpen: true }">
            <div id="adminSidebar" class="d-flex flex-column text-white flex-shink-0 bg-dark p-3 offcanvas-md offcanvas-start">
                <!-- Nav Sidebar-->
                <x-admin.navigation/>
            </div>
        </div>
        <div class="bg-secondary flex-fill">
            <div class="p-4 d-md-none d-flex justify-content-between text-white bg-dark">
                <a href="/" class="navbar-brand">
                    {{ env('APP_NAME') }}
                </a>
                <a href="#adminSidebar" class="text-white" data-bs-toggle="offcanvas">
                    <x-icons.hero-bars class="bi bi-justify m-1" width="18" height="18"/>
                </a>
            </div>
            <div class="row">
                <div class="col m-3">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
    @livewireScripts
    @stack('admin-scripts')
</html>
