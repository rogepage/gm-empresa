<!DOCTYPE html>
<html lang="en">

<head>
				<title>Spartansite - Jogos de Empresas</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">

				<style>
								/* Remove the navbar's default margin-bottom and rounded borders */
								.navbar {
												margin-bottom: 0;
												border-radius: 0;
								}

								/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
								.row.content {
												height: 1150px
								}

								/* Set gray background color and 100% height */
								.sidenav {
												padding-top: 10px;
												background-color: #f1f1f1;
												height: 100%;
								}

								/* Set black background color, white text and some padding */
								footer {
												background-color: #555;
												color: white;
												padding: 15px;
								}

								/* On small screens, set height to 'auto' for sidenav and grid */
								@media screen and (max-width: 767px) {
												.sidenav {
																height: auto;
																padding: 15px;
												}

												.row.content {
																height: auto;
												}
								}
				</style>
</head>

<body>

				<nav class="navbar navbar-inverse">
								<div class="container-fluid" style="background-image: url({{ asset('img/bg-ceu.jpeg') }}); border=0">
												<div class="navbar-header">
																<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																</button>
																<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.gif') }}"
																								alt="Spartansite"></a>
												</div>
												<div class="navbar-collapse collapse" id="myNavbar">
																<ul class="nav navbar-nav">
																				<li class="active"><a href="#">Home</a></li>
																				<li><a href="#">About</a></li>
																				<li><a href="#">Projects</a></li>
																				<li><a href="#">Contact</a></li>
																</ul>
																<ul class="nav navbar-nav navbar-right">
																				<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
																</ul>
												</div>
								</div>
				</nav>

				<div class="container-fluid text-center">
								<div class="row content">
												<div class="col-sm-2 sidenav" style="background-image: url({{ asset('img/bg-mar.jpeg') }});">

												</div>
												<div class="col-sm-8 text-left">
																@yield('content')
												</div>
												<div class="col-sm-2 sidenav" style="background-image: url({{ asset('img/bg-mar.jpeg') }});">

												</div>
								</div>
				</div>


				<footer class="container-fluid text-center" style="background-image: url({{ asset('img/bg-mar.jpeg') }});">
								<p>.</p>
				</footer>

				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
				<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

</body>

</html>
