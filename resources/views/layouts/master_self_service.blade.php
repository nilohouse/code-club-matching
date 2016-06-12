<html>
    <head>
        <title>Code Club Brasil - @yield('subtitle')</title>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/code-club.css">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="/logo-br.svg">
        <meta name="msapplication-TileColor" content="#F5F6F9">
        <meta name="msapplication-TileImage" content="/logo-br.svg">
        <link rel="icon" href="logo-br.svg" sizes="32x32">
        <script src="/js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/code-club-br.js"></script>
    </head>
    <body>
        @include('includes.header')
        
        @yield('content')

        @include('includes.footer')
    </body>
</html>