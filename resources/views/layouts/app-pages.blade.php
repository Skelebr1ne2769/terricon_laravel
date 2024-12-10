<!DOCTYPE html>
<html lang="en">
<head>
<title>Страница</title>
<meta charset="utf-8"><link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/css/grid.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/css/camera.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.1.1.js"></script>
    <script type="text/javascript" src="/js/camera.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
    <script>
        jQuery(function(){      
        jQuery('#camera_wrap_1').camera({
            height: '317px',
            loader: false,
            pagination: false,
            thumbnails: false
        });
        });
    </script>
</head>

<body>
	<header>
		<div class="container_12" style="width: 1080px">
			<div class="grid_12" style="width: 1080px">
				<div class="wrapper">
					<a href="/" class="logo">TERRICON</a>
					<nav>
						<ul class="menu">
							<li><a href="/">Главная</a></li>
							<li><a href="{{ route('pages', 'works') }}">Портфолио</a></li>
							<li><a href="{{ route('pages', 'clients') }}">Клиенты</a></li>
							<li><a href="{{ route('pages', 'blog') }}">Блог</a></li>
							<li><a href="{{ route('pages', 'contacts') }}">Контакты</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li>
                                        <a
                                            href="{{ url('/dashboard') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Dashboard
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a
                                            href="{{ route('login') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Log in
                                        </a>
                                    </li>
                                    

                                    @if (Route::has('register'))
                                        <li>
                                            <a
                                                href="{{ route('register') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            >
                                                Register
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

    @yield('content');
</body>
</html>