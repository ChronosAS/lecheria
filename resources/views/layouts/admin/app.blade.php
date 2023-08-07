<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <!-- <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script> -->
        @vite(['resources/scss/app.scss','resources/js/app.js','public/assets/vendor/ckeditor5/sample/styles.css','public/assets/vendor/ckeditor5/build/translations/es.js'])
        @stack('admin-styles')
        @livewireStyles
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 px-0 position-fixed">
                    <!-- Nav Sidebar-->
                    <div class="d-none position-relative d-lg-block d-sm-block min-vh-100">
                        <x-admin.navigation/>
                    </div>
                    <!-- Nav Sidebar Mobile-->
                    <div class="d-block d-sm-none">
                        <x-admin.navigation-mobile/>
                    </div>
                </div>
                <div class="col-9 bg-secondary offset-3 min-vh-100">
                    <div class="mx-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>

    @livewireScripts
    @stack('admin-scripts')
</html>
