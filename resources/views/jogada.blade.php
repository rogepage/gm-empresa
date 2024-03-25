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
								<h1 class="text-center">Joga</h1>
								<form action="{{ route('simulador.simular') }}" method="POST" id="quickForm">
												@csrf

												<div class="row">

																<div class="col">
																				<div class="card">
																								<div class="card-body">
																												<h5 class="card-title">Dell</h5>
																												{{-- <form> --}}
																												<div class="mb-3">
																																<label for="campo1" class="form-label">Preço (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('dell_valor', isset($form['dell_valor']) ? $form['dell_valor'] : '') }}"
																																				id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00"
																																				onkeyup="formatarMoeda(this)">
																												</div>
																												<div class="mb-3">
																																<label for="campo2" class="form-label">Folha de pagamento (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('dell_folha', isset($form['dell_folha']) ? $form['dell_folha'] : '') }}"
																																				id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00"
																																				onkeyup="formatarMoeda(this)">
																												</div>
																												<div class="mb-3">
																																<label for="campo3" class="form-label">Publicidade (%)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('dell_publicidade', isset($form['dell_publicidade']) ? $form['dell_publicidade'] : '') }}"
																																				id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2,4"
																																				onkeyup="formatarMoeda(this)">
																												</div>





																								</div>
																				</div>
																</div>

												</div>

												<div class="row">


																<div>
																				<br><br>
																				<div class="row">
																								<button type="submit" class="btn btn-primary mt-3">Gravar jogada</button>

																				</div>

																				<div class="row">
																								<button type="button" class="btn btn-warning mt-3"
																												onclick="self.location='{{ url('/simulador') }}'">Voltar
																								</button>

																				</div>
																</div>
												</div>
								</form>
				</div>




</body>

</html>
