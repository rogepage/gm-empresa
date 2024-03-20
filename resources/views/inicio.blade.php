<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
				<title>Spartansite :: Jogos de Empresas</title>
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
				<div class="container">
								<h1 class="text-center">Iniciar o jogo</h1>
								<form action="{{ route('selecao.empresa') }}" method="POST" id="quickForm">
												@csrf

												<div class="row">


																<div>
																				<h1> Sobre o jogo </h1>
																				<p>
																								- Serão ao todo 4 rodadas e o resultado será apresentado no final.<br>
																								- A partir da 3 rodada será disponibilizado a opção investimento.<br>
																								- Vence a empresa que tiver o melhor resultado ao final das 4 rodadas <br>
																				</p>
																</div>
												</div>


												<div class="row">

																<div class="col">
																				<div class="card">
																								<div class="card-body">
																												<h5 class="card-title">Escolha uma empresa</h5>
																												{{-- <form> --}}
																												<br>

																												<div class="row align-items-start">
																																<div class="col">
																																				<div class="form-check">
																																								<input class="form-check-input" type="radio" value="DELL" name="empresa"
																																												id="flexRadioDefault1">
																																								<label class="form-check-label" for="flexRadioDefault1">
																																												DELL
																																								</label>
																																				</div>
																																</div>
																																<div class="col">
																																				<div class="form-check">
																																								<input class="form-check-input" type="radio" value="HP" name="empresa"
																																												id="flexRadioDefault1">
																																								<label class="form-check-label" for="flexRadioDefault1">
																																												HP
																																								</label>
																																				</div>
																																</div>

																												</div>

																												{{-- </form> --}}
																								</div>
																				</div>
																</div>
												</div>



												<div class="row">


																<div>
																				<br><br>
																				<div class="row">
																								<button type="submit" class="btn btn-primary mt-3">Iniciar</button>

																				</div>

																				<div class="row">
																								<button type="button" class="btn btn-warning mt-3"
																												onclick="self.location='{{ url('/simulador') }}'">Voltar
																								</button>

																				</div>
																</div>
												</div>
				</div>



				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
				<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

</body>

</html>
