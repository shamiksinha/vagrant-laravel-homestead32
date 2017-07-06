<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/rkm-udb.css') }}" rel="stylesheet">

<!-- Scripts -->
<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    
</head>
<body>
	<div id="app">
		<!-- <nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">-->

		<!-- Collapsed Hamburger -->
		<!-- <button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button> -->

		<!-- Branding Image -->
		<!-- <a class="navbar-brand" href="{{ url('/') }}"> {{
						config('app.name', 'Laravel') }} </a>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
		<!-- Left Side Of Navbar -->
		<!-- <ul class="nav navbar-nav">&nbsp;
					</ul> -->

		<!-- Right Side Of Navbar -->
		<!-- <ul class="nav navbar-nav navbar-right"> -->
		<!-- Authentication Links -->
		<!-- @if (Auth::guest())
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li> @else
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false"> {{
								Auth::user()->name }} <span class="caret"></span>
						</a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										Logout </a>

									<form id="logout-form" action="{{ route('logout') }}"
										method="POST" style="display: none;">{{ csrf_field() }}</form>
								</li>
							</ul></li> @endif
					</ul>
				</div>
			</div>
		</nav>-->
		<div class="Inner-LayoutInside">
			<nav id="Top-Nav-panel">
				<div
					style="width: 500px; margin-left: 20px; float: left; padding-bottom: 20px;">
					<ul>
						<li><a class="active" href="{{ url('/') }}">Home</a></li>
						<li><a href="#E-Book">E-Book</a></li>
						<li><a href="#Blog">Blog</a></li>
						<!-- <li><a href="#about">Subscribe</a></li> -->
						<li><a href="{{ url('/search') }}">Search</a></li>
						<!-- <li><a href="#about">Sitemap</a></li> -->
						<!-- Authentication Links -->
						@if (Auth::guest())
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Subscribe</a></li> @else
						<!-- <li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false"> {{
								Auth::user()->name }} <span class="caret"></span>
						</a>

							<ul class="dropdown-menu" role="menu"> -->
						<li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								Logout </a>

							<form id="logout-form" action="{{ route('logout') }}"
								method="POST" style="display: none;">{{ csrf_field() }}</form></li>
						<li><a href="#"> {{ Auth::user()->name }}</a> <!-- </ul></li> -->
							@endif
					
					</ul>
				</div>
				<div id="Inner-socialMedia">
					<img src="{{asset('images/social-mda-icons.png')}}" border="0"
						usemap="#Map" />
					<map name="Map" id="Map">
						<area shape="circle" coords="16,2,2" href="#" />
						<area shape="rect" coords="-10,0,30,38" href="#" />
						<area shape="rect" coords="28,0,61,32" href="#" />
						<area shape="rect" coords="60,0,97,41" href="#" />
						<area shape="rect" coords="97,0,128,37" href="#" />
						<area shape="rect" coords="128,0,161,25" href="#" />
					</map>
				</div>
			</nav>
			<!--<div id="top-bg">-->
				<div id="white-boxTitle">
					<div id="innertop">
						<!--<div id="RKMlogo"></div>-->
						<div class="InsideTitle">{{ config('app.name', 'Laravel') }}</div>
						<div class="InsideSubTitle">100 years E-Book for You</div>
					</div>
				</div>
				<div id="inner-Conten">
					<div id="white-boxInside">
						<div style="padding:20px;">
							<div id="search-layerInsd">
								<form id="searchform" name="searchform" method="post" action="/search">
									{{ csrf_field() }}
									<span id="searchfield1"> <input type="text" name="Search"
										id="Search" /> <!-- <span class="textfieldRequiredMsg">Search</span> --></span>

									<div id="SearchButton" onclick="event.preventDefault();
															 document.getElementById('searchform').submit();"></div>
									<br /> <br /> <br />
									<p>Please enter bengali year for 100 years e-book.</p>
								</form>
							</div>
							<!--<div id="Ebok-icon">
								<img src="images/book_RKM.png" />
							</div>-->
							<!--<div style="padding-top:150px; height:auto">-->
								<!--<p>Search result </p>-->
								<!--<div id="box">-->
									@yield('content')
								<!--</div>-->
							<!--</div>-->
						</div>
					</div>
					<div id="Ad-space">1sdasadjd kADK</div>
				</div>
			</div>
			<div class="footer">Copyright © 2017 by Ramkrish Math</div>
		<!--</div>-->
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	
	@yield('scripts')
</body>
</html>
