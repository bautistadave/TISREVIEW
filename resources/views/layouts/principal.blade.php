<!DOCTYPE html>
<html>
<head>
<title>SAT | UMSS </title>
{!!Html::style("css/bootstrap.css")!!}
{!!Html::style("css/style.css")!!}
{!!Html::script("js/jquery.min.js")!!}
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a class="active" href="/index"><i class="home"></i></a></li>
					<li><a href="/reviews"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="/#"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">

		@yield('content')



	<div class="footer">
		<h6>Informacion : </h6>
		<p class="claim">El sistema realizara la asignacion de tribunales segun la area del proyecto</p>
		<a href="cabacDevs@gmail.com">ecabacDevs@gmail.com</a>
		<div class="copyright">
			<p> Template by  <a href="http://fcyt.umss.edu.bo">  FCYT</a></p>
			<p> Template by  <a href="http://websis.umss.edu.bo">  WEBSIS</a></p>
			<p> Template by  <a href="http://www.cs.umss.edu.bo">  CS</a></p>

		</div>
	</div>
	</div>
	</div>
			<script type="text/javascript">
		$(window).load(function() {

		  $("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint:480,
						visibleItems: 2
					},
					landscape: {
						changePoint:640,
						visibleItems: 3
					},
					tablet: {
						changePoint:768,
						visibleItems: 4
					}
				}
			});
			});
		</script>
		{!!Html::script("js/jquery.flexisel.js")!!}
		{{-- <script type="text/javascript" src="js/jquery.flexisel.js"></script> --}}
	<div class="clearfix"></div>
</body>
</html>
