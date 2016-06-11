<html>
    <head>
        <title>Code Club Brasil - @yield('subtitle')</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/code-club.css">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="logo-br.svg">
        <meta name="msapplication-TileColor" content="#F5F6F9">
        <meta name="msapplication-TileImage" content="logo-br.svg">
        <link rel="icon" href="logo-br.svg" sizes="32x32">
    </head>
    <body>
        @include('includes.header')

        <div class="o-hero">
          <div class="c-grid">
            <div class="c-col--12">
              <div class="o-hero__body">
                <h1 class="o-hero__title">Seja um voluntário</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="c-page-block">
          <div class="c-grid c-grid--h-center">
            <div class="c-col--6">
              <div class="box">

                <div class="container">
                    @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('includes.footer')
    </body>
</html>