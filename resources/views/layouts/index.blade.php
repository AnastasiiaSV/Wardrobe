<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="author" content="Anastasiia Samotiazhko">
	<meta name="copyright" content="Created by A.V.Samotiazhko in 2017">

	<meta charset="windows-1251">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="publisher-email" content="anastsamot@gmail.com">
	
	<title>WARDROBE</title>
	<link rel="icon" href="{!! URL::asset('content/icons/icon.jpg') !!}">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/header_footer2.css') !!}"  >
	<link rel="stylesheet" href="{{ URL::asset('css/style7.css') }}" >
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/items.css') !!}"  >

	<script src="{{ URL::asset('js/items.js') }}"></script>
	<script src="{{ URL::asset('js/login.js') }}"></script>

</head>

<body>
	<!--header-->
	<header>
		<a href="/" class="logo">
			<img src="{!! URL::asset('content/icons/logo.jpg')!!}" alt=" WARDROBE ">
		</a>

		<nav class="main_menu">
			<table>
				<tr>
					<td class="main_menu_element_9"> </td>
					<td class="main_menu_element_8"> </td>
					<td class="main_menu_element_7"></td>
					<td class="main_menu_element_6"> </td>
					<td class="main_menu_element_5">
						<a href="{{ url('/login') }}">
							<img src="{!! URL::asset('content/icons/login_icon.png')!!}" alt="LOGIN">
						</a>
					</td>
					<td class="main_menu_element_4"> </td>
					<td class="main_menu_element_3">
						<a href="{{ url('/account') }}">
							<img src="{!! URL::asset('content/icons/user_icon.png')!!}" alt="ACCOUNT">
						</a>
					</td>
					<td class="main_menu_element_2"> </td>
					<td class="main_menu_element_1">
						<a href="{{ url('/main_page') }}">
							<img src="{!! URL::asset('content/icons/lang.png')!!}" alt="MAIN PAGE">
						</a>
					</td>
					<td class="main_menu_element_2"> </td>
					<td class="main_menu_element_3"></td>
					<td class="main_menu_element_4"> </td>
					<td class="main_menu_element_5">
						<a href="{{ url('/main_page') }}">
							<img src="{!! URL::asset('content/icons/contacts_icon.png')!!}" alt="CONTACTS">
						</a>
					</td>
					<td class="main_menu_element_6"> </td>
					<td class="main_menu_element_7"> </td>
					<td class="main_menu_element_8"></td>
					<td class="main_menu_element_9"> </td>
				</tr>
			</table>
		</nav><!--class="main-menu"-->
	</header><!--header-->
	
	<div class="main_page">
		<div class="container">
			@yield('content')
		</div>
	</div>
	
	
	<hr class="footer_hr"/>
	<!--footer-->
	<footer>
		<div class="footer_column">
			<nav>
				<ul>
					<li>
					</li>
				</ul>
			</nav>
		</div>
		<div class="footer_column">
			<nav>
				<ul>
					<li>
						<a href="{{ url('/login') }}">Login</a>
					</li>
					<li>
						<a href="{{ url('/account') }}">Account</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="footer_column">
		<nav>
			<ul>
				<li>Language</li>
				<li>Eng</li>
				<li>Rus</li>
			</ul>
		</nav>
		</div>
		

		<div class="footer_column">
			<nav>
				<ul>
					<li> </li>
					<li> </li>
				</ul>
			</nav>
		</div>

	
		<div class="footer_column">
			<ul>
			<li> &copy; <small> Anastasiia Samotiazhko 2017 </small></li>
			</ul>
		</div>
		
	</footer><!--footer-->

</body>

</html>
