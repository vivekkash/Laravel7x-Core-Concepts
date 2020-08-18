<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
		@yield('styles')
</head>
<body>
	<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="#">@lang('nav.home', ['user'=> 'Hi, vivek'])</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
        </ul>

         <ul class="uk-navbar-nav">
            <li>
                <a href="#">@lang('nav.services')</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
        </ul>

         <ul class="uk-navbar-nav">
            <li>
                <a href="#">@lang('nav.contact')</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
</nav>
	<div class="uk-container">
		@yield('content')
	</div>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script>
	@yield('scripts')
</body>
</html>