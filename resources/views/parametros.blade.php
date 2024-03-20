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
								<h1 class="text-center">Parâmetros do Jogo</h1>


								<div class="row">

												<div class="col">
																<div class="card">
																				<div class="card-body">
																								<h5 class="card-title"></h5>

																								@if ($message = Session::get('sucesso'))
																												<div class="alert alert-success">
																																<p>{{ $message }}</p>
																												</div>
																								@endif
																								@if ($errors->any())

																												<div class="alert alert-danger">
																																<ul>
																																				@foreach ($errors->all() as $error)
																																								<li>{{ $error }}</li>
																																				@endforeach
																																</ul>
																												</div>
																								@endif
																								{{-- <form> --}}
																								<form action="{{ route('parametros.update') }}" method="POST" id="quickForm">
																												@csrf
																												<div class="mb-3">
																																<label for="campo1" class="form-label">Custo direto (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('custo_direto', $parametro->custo_direto) }}" id="custo_direto"
																																				name="custo_direto" placeholder="ex: 1.500,00" onkeyup="formatarMoeda(this)"
																																				required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Despesas fixas (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('despesa_fixa', $parametro->despesa_fixa) }}" id="despesa_fixa"
																																				name="despesa_fixa" placeholder="ex: 1.500,00" onkeyup="formatarMoeda(this)"
																																				required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Juros</label>
																																<input type="text" class="form-control" value="{{ old('juros', $parametro->juros) }}"
																																				id="juros" name="juros" placeholder="24" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Fator Folha</label>
																																<input type="text" class="form-control"
																																				value="{{ old('fator_folha', $parametro->fator_folha) }}" id="fator_folha"
																																				name="fator_folha" placeholder="ex: 0,8" onkeyup="formatarMoeda(this)" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Fator propaganda</label>
																																<input type="text" class="form-control"
																																				value="{{ old('fator_folha', $parametro->fator_propaganda) }}" id="fator_propaganda"
																																				name="fator_propaganda" placeholder="ex: 0,008" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Valor máximo do produto (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('valor_maximo_produto', $parametro->valor_maximo_produto) }}"
																																				id="valor_maximo_produto" name="valor_maximo_produto" placeholder="ex: 5.000"
																																				onkeyup="formatarMoeda(this)" required>
																												</div>


																												<div class="mb-3">
																																<label for="campo1" class="form-label">Novo custo direto (R$)</label>
																																<input type="text" class="form-control"
																																				value="{{ old('novo_custo_direto', $parametro->novo_custo_direto) }}"
																																				id="novo_custo_direto" name="novo_custo_direto" placeholder="ex: 1.300"
																																				onkeyup="formatarMoeda(this)" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Ganho mercado</label>
																																<input type="text" class="form-control"
																																				value="{{ old('ganho_mercado', $parametro->ganho_mercado) }}" id="ganho_mercado"
																																				name="ganho_mercado" placeholder="ex: 200" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Elasticidade do produto</label>
																																<input type="text" class="form-control"
																																				value="{{ old('novo_custo_direto', $parametro->elasticidade_produto) }}"
																																				id="novo_custo_direto" name="elasticidade_produto" placeholder="ex: 0,8"
																																				onkeyup="formatarMoeda(this)" required>
																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Habilitar investir em linha de
																																				produção</label>
																																<select class="form-control" name="investimento">
																																				<option value="0"
																																								{{ old('investimento', $parametro->investimento) == '0' ? 'selected' : '' }}>
																																								Não
																																				</option>
																																				<option value="1"
																																								{{ old('investimento', $parametro->investimento) == '1' ? 'selected' : '' }}>
																																								Sim
																																				</option>
																																</select>

																												</div>

																												<div class="mb-3">
																																<label for="campo1" class="form-label">Valor investimento (R$) </label>
																																<input type="text" class="form-control"
																																				value="{{ old('valor_investimento', $parametro->valor_investimento) }}"
																																				id="valor_investimento" name="valor_investimento" placeholder="ex: 3.000"
																																				onkeyup="formatarMoeda(this)" required>
																												</div>


																												<div class="row">
																																<button type="submit" class="btn btn-primary mt-3">Alterar valores</button>
																																<div>

																																				<div class="row">
																																								<button type="button" class="btn btn-danger mt-3"
																																												onclick="self.location='{{ url('/parametros/reset') }}'">Restaurar valores
																																												default</button>
																																								<div>
																																												<form>

																																																<div class="row">
																																																				<button type="button" class="btn btn-warning mt-3"
																																																								onclick="self.location='{{ url('/') }}'">Simulador</button>
																																																				<div>
																																																								{{-- </form> --}}
																																																				</div>
																																																</div>
																																								</div>


																																				</div>

																																				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
																																				<script>
																																								function formatarMoeda(input) {
																																												var elemento = input;
																																												var valor = elemento.value;

																																												valor = valor + '';
																																												valor = parseInt(valor.replace(/[\D]+/g, ''));
																																												valor = valor + '';
																																												valor = valor.replace(/([0-9]{2})$/g, ",$1");

																																												if (valor.length > 6) {
																																																valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
																																												}

																																												elemento.value = valor;
																																												if (valor == 'NaN') elemento.value = '';
																																								}
																																				</script>

</body>

</html>
