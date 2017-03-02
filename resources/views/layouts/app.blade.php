<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="giviews we give some views to your life's">
    <meta name="author" content="Giviews, Inc.">
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#4285f4">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/favicon.png" />
    <link rel="icon" type="image/png" href="/favicon.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/favicon.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/favicon.png" sizes="128x128" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'giviews') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
      <init></init>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if(Auth::guest())
                    <div class="navbar-brand">
                      <a href="{{ url('/') }}">
                          <img src="favicon.png" alt="giviews" width="30px" height="30px">
                      </a>
                    </div>
                    @else
                    <div class="navbar-brand">
                      <a href="{{ url('/home') }}">
                        <img src="favicon.png" alt="giviews" width="30px" height="30px">
                      </a>
                    </div>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @if(Auth::check())
                        <li><a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">My Profile</a></li>
                        <unread></unread>

                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if(Auth::guest())
                              <li><a href="{{ url('/login') }}" style="color:#fff;text-decoration:bold;">Login</a></li>
                              <li><a href="{{ url('/register') }}" style="color:#fff;text-decoration:bold;">Register</a></li>
                        @else
                            <li class="dropdown">
                              <a id="dLabel" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-search"></i>
                              </a>

                              <ul class="dropdown-menu long" aria-labelledby="dLabel">
                                <search></search>
                              </ul>
                            </li>
                            <li><a href="/chat">Chat <span class="badge pull-right">@{{ usersInRoom.length }}</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        @if(Auth::check())
          <notification :id="{{ Auth::id() }}"></notification>
        @endif
        <audio id="notify_audio">
          <source src="{{ asset('audio/notify.mp3') }}">
          <source src="{{ asset('audio/notify.ogg') }}">
          <source src="{{ asset('audio/notify.wav') }}">
        </audio>

        <div class="panel-footer">
          <div class="container">
          copyrights &copy; {{ date('Y') }} Giviews, Inc. All Rights Reserved.
          <a href="/blog">Blog</a>
          <a href="/career">Careers</a>
          <a href="/dev">Developer</a>
          <a href="/adds">Adds</a>
          <a href="/privacy">Privacy</a>
          <a href="/faq">FAQ</a>
          <a href="/download">Download</a>
          <a href="/help">Help</a>
          <p class="pull-right">Made with <i class="glyphicon glyphicon-love"></i> in Jakarta</p>
        </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
      @if(Session::has('success'))
        noty({
          type: 'success',
          layout: 'bottomLeft',
          text: '{{ Session::get('success') }}'
        });
      @endif
    </script>
</body>
</html>
