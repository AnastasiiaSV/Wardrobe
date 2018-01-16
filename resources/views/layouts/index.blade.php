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

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/header_footer4.css') !!}"  >
	<link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}" >
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/items.css') !!}"  >

	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">	</script>

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
					<td class="main_menu_element_7"> </td>
					<td class="main_menu_element_6"> </td>
					<td class="main_menu_element_5"> </td>
					<td class="main_menu_element_4">

					</td>
					<td class="main_menu_element_3">
						<a href="{{ url('/account') }}" id = 'a_account'>
							<img src="{!! URL::asset('content/icons/user_icon3.png')!!}" alt={{Lang::get('constants.account')}}>
						</a>
					</td>
					<td class="main_menu_element_2">

					</td>
					<td class="main_menu_element_1">
						<a href="{{ url('/main_page') }}" id = 'a_main'>
							<img src="{!! URL::asset('content/icons/lang2.png')!!}" alt="MAIN PAGE">
						</a>
					</td>
					<td class="main_menu_element_2">

					</td>
					<td class="main_menu_element_3">
						<a href="{{ url('/contacts') }}" >
							<img src="{!! URL::asset('content/icons/contacts_icon3.png')!!}" alt={{Lang::get('constants.contacts')}}>
						</a>

					</td>
					<td class="main_menu_element_4">

					</td>
					<td class="main_menu_element_5">

					</td>
					<td class="main_menu_element_6"> </td>
					<td class="main_menu_element_7"> </td>
					<td class="main_menu_element_8"> </td>
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

				</ul>
			</nav>
		</div>
		<div class="footer_column">
			<nav>
				<ul>
					<li>
						<a href="{{ url('/login') }}">{{Lang::get('constants.login')}}</a>
					</li>
					<li>
						<a href="{{ url('/account') }}">{{Lang::get('constants.account')}}</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="footer_column">
		<nav>
			<ul>
				<li>{{Lang::get('constants.language')}}</li>


				<li><a href="{{ url("setlocale/en") }}">ENG</a></li>
				<li><a href="{{ url("setlocale/ru") }}">RU</a></li>

			</ul>
		</nav>
		</div>
		

		<div class="footer_column">
			<nav>
				<ul>
					<li>
						<a href="{{ url('/contacts') }}" >{{Lang::get('constants.contacts')}}</a>
					</li>

					<li>
						<a href="https://www.facebook.com" target="_blank">
							<img class="footer_social_icon" src="{!! URL::asset('content/icons/facebook1.png')!!}" alt=" facebook ">
						</a>

						<a href="https://ru.pinterest.com/" target="_blank">
							<img class="footer_social_icon" src="{!! URL::asset('content/icons/pinterest.png')!!}" alt=" pinterest ">
						</a>

						<a href="https://www.instagram.com" target="_blank">
							<img class="footer_social_icon" src="{!! URL::asset('content/icons/instagram.png')!!}" alt=" instagram ">
						</a>
					</li>

				</ul>
			</nav>
		</div>

	
		<div class="footer_column">
			<ul>
			<li> &copy; <small> Anastasiia Samotiazhko 2017 </small></li>
			</ul>
		</div>
		
	</footer><!--footer-->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="{{ asset('js/item.js') }}"></script>
	<script src="{{ asset('js/form.js') }}"></script>


</body>

</html>
