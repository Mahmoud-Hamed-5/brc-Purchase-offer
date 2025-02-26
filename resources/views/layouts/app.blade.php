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

    <!-- Your existing styles -->
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>

<body>

    @include('layouts.topbar')

    <div id="loading-spinner" style="display: none;">
        <div class="spinner"></div>
    </div>

    <button id="back-to-top" title="Go to top">&#8593;</button>

    <!-- Main container for content and ads board -->
    <div class="main-container">

        <!-- Main content -->
        <div class="content">
            <div class="mt-2" dir="ltr">
                @include('layouts.partials.messages')
            </div>

            @yield('content-body')
        </div>

        <!-- Ads board -->
        <div class="ads-board">
            <h4>لوحة الإعلانات</h4>
            <div class="ad-item">
                <p>إعلان 1: وصف الإعلان هنا.</p>
            </div>
            <div class="ad-item">
                <p>إعلان 2: وصف الإعلان هنا.</p>
            </div>
            <div class="ad-item">
                <p>إعلان 3: وصف الإعلان هنا.</p>
            </div>
        </div>

    </div>

    @include('layouts.footer')

    @include('layouts.scripts')

</body>

</html>
