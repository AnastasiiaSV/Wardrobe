<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="author" content="Anastasiia Samotiazhko">
	<meta name="copyright" content="Created by A.V.Samotiazhko in 2017">

	<meta charset="windows-1251">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="publisher-email" content="anastsamot@gmail.com">
	
	<title>WARDROBE</title>

	@yield('styles')
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/header_footer.css') !!}"  >
	<link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}" >

	<script src="{{ URL::asset('js/items.js') }}"></script>
	<script src="{{ URL::asset('js/login.js') }}"></script>

</head>

<body>
	<!--header-->
	<header>
		<nav class="main_menu">
			<table>
				<tr>
					<td class="main_menu_element_9"> </td>
					<td class="main_menu_element_8"> </td>
					<td class="main_menu_element_7"> </td>
					<td class="main_menu_element_6"> </td>
					<td class="main_menu_element_5"> </td>
					<td class="main_menu_element_4"> </td>
					<td class="main_menu_element_3"> </td>
					<td class="main_menu_element_2"> </td>
					<td class="main_menu_element_1"> </td>
					<td class="main_menu_element_2"> </td>
					<td class="main_menu_element_3"> </td>
					<td class="main_menu_element_4"> </td>
					<td class="main_menu_element_5"> </td>
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
					<li>
					</li>
				</ul>
			</nav>
		</div>
		<div class="footer_column">
			<nav>
				<ul>
					<li></li>
				</ul>
			</nav>
		</div>

		<div class="footer_column">
		<nav>
			<ul>
				<li></li>
				<li></li>

				<li></li>
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
