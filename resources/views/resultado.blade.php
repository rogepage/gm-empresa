<!DOCTYPE html>
<html lang="pt-BR">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Meu Layout Bootstrap</title>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
								integrity="sha384-rbsA2VBKQ/gzos'VAz5/ZUaJty30952v4W98COYWJtQ17x95+B455E96R5530" crossorigin="anonymous">
				<link rel="stylesheet" href="style.css">
</head>

<body>
				<header class="header">
								<div class="container">
												<nav class="navbar navbar-expand-lg navbar-light">
																<a class="navbar-brand" href="#">
																				<img src="logo.png" alt="Logo" width="150px">
																</a>
																<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
																				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
																				<span class="navbar-toggler-icon"></span>
																</button>
																<div class="navbar-collapse collapse" id="navbarNav">
																				<ul class="navbar-nav">
																								<li class="nav-item">
																												<a class="nav-link active" aria-current="page" href="#">Home</a>
																								</li>
																								<li class="nav-item">
																												<a class="nav-link" href="#">Sobre</a>
																								</li>
																								<li class="nav-item">
																												<a class="nav-link" href="#">Serviços</a>
																								</li>
																								<li class="nav-item">
																												<a class="nav-link" href="#">Contato</a>
																								</li>
																				</ul>
																</div>
												</nav>
								</div>
				</header>
				<main class="main">
								<section class="section-1">
												<div class="container">
																<div class="row">
																				<div class="col-md-6">
																								<h2>Título da Seção 1</h2>
																								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium lectus.
																												Fusce convallis neque eget risus ultricies, eu tincidunt purus tincidunt.</p>
																				</div>
																				<div class="col-md-6">
																								<img src="imagem.jpg" alt="Imagem" class="img-fluid">
																				</div>
																</div>
												</div>
								</section>
								<section class="section-2">
												<div class="container">
																<div class="row">
																				<div class="col-md-12">
																								<form action="#">
																												<div class="form-group">
																																<label for="nome">Nome:</label>
																																<input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
																												</div>
																												<div class="form-group">
																																<label for="email">Email:</label>
																																<input type="email" class="form-control" id="email"
																																				placeholder="Digite seu email">
																												</div>
																												<div class="form-group">
																																<label for="mensagem">Mensagem:</label>
																																<textarea class="form-control" id="mensagem" rows="3"></textarea>
																												</div>
																												<button type="submit" class="btn btn-primary">Enviar</button>
																								</form>
																				</div>
																</div>
												</div>
								</section>
				</main>
</body>

</html>
