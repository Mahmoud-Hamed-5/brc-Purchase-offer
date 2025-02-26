<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BRC') }}</title>

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/icons/brc_icon.ico') }}" type="image/jpg" />

    @include('layouts.head-css')

</head>

<body>

    @include('layouts.topbar')


    <!-- المحتوى الرئيسي -->
    <div class="content">

        <div class="mt-2" dir="ltr">
            @include('layouts.partials.messages')
        </div>


        @yield('content-body')
        
    </div>

    @include('layouts.footer')

    @include('layouts.scripts')

</body>

</html>
