<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
</head>
<style>
    body{
        background-color: grey;
        color:white;
    }
    .bg-white{
        background-color: dimgrey !important;
    }
    .navbar-light .navbar-brand{
        color: white;
    }
    .navbar-light .navbar-nav .nav-link.active {
        color: white;
    }
    .navbar-light .navbar-nav .nav-link {
        color: white;
    }
    .card{
        border: 0px;
    }
    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: dimgrey;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    .card-body {
        background-color: darkgrey;
    }
    .btn-primary {
        color: #fff;
        background-color: dimgrey;
        border-color: dimgrey;
    }
    .btn-link{
        color: white;
    }
    a{
        color:dimgrey;
    }
    
</style>
<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    @include('includes.partials.announcements')

    <div id="app">
        @include('frontend.includes.nav')
        @include('includes.partials.messages')

        <main>
            @yield('content')
        </main>
    </div><!--app-->

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
</html>
