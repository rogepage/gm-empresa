@extends('layout.site')
@section('content')
				<div class="container">
								<h1 class="text-center">Rodadas</h1>
								<form action="{{ route('jogada.gravar') }}" method="POST" id="quickForm">
												@csrf
												@if (isset($sucesso))
																<div class="alert alert-success">
																				<p>{{ $sucesso }}</p>

																				<p>Agora realize a {{ count($jogadas) + 1 }} &#170; rodada</p>
																</div>
												@endif

												<div class="row">

																<div class="col">
																				<div class="card">
																								<div class="card-body">
																												<h5 class="card-title"><strong>{{ $empresa }}</strong> </h5>
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

																												@if (count(isset($jogadas) ? $jogadas : []) + 1 >= 3)
																																<div class="mb-3">
																																				<label for="campo3" class="form-label">Investir
																																								<strong> {{ money($jogadas[0]->valor_investimento, 'BRL') }} </strong> em
																																								linha de
																																								produção?</label>
																																				<select class="form-control" name="hp_investimento" id="combo_hp_investe">
																																								<option value="0"
																																												{{ old('hp_investimento', isset($form['hp_investimento']) ? $form['hp_investimento'] : 0) == '0' ? 'selected' : '' }}>
																																												Não
																																								</option>
																																								<option value="1"
																																												{{ old('hp_investimento', isset($form['hp_investimento']) ? $form['hp_investimento'] : 0) == '1' ? 'selected' : '' }}>
																																												Sim
																																								</option>
																																				</select>
																																</div>
																												@endif





																								</div>
																				</div>
																</div>

												</div>

												<div class="row">


																<div>
																				<br><br>
																				<div class="row">
																								<button type="submit" class="btn btn-primary mt-3">Gravar
																												{{ count($jogadas ? $jogadas : []) + 1 }}
																												&#170; jogada</button>

																				</div>

																				<div class="row">
																								<button type="button" class="btn btn-warning mt-3"
																												onclick="self.location='{{ url('/inicio') }}'">Reiniciar
																								</button>

																				</div>
																</div>
												</div>
								</form>
				</div>
@endsection
