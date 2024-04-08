@extends('layout.site')

@section('content')
				<section class="section-internal-header">
								<div class="row">
												<div class="container">
																<div class="title">
																				<h2>Iniciar o jogo</h2>
																</div>
												</div>
								</div>
				</section>

				<div class="container">

								<form action="{{ route('selecao.empresa') }}" method="POST" id="quickForm">
												@csrf

												<div class="row" style="padding: 100px">


																<div class="text-left">
																				<h1> Sobre o jogo </h1>
																				<p class="text-left">
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
																																								<input class="form-check-input" required type="radio" value="DELL"
																																												name="empresa" id="flexRadioDefault1">

																																								DELL

																																				</div>
																																</div>
																																<div class="col">
																																				<div class="form-check">
																																								<input class="form-check-input" required type="radio" value="HP"
																																												name="empresa" id="flexRadioDefault1">
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
																<div class="col-md-6">
																				<button type="submit" class="btn btn-primary mt-3">Iniciar Jogo</button>
																</div>
																<div class="col-md-6">
																				<button type="button" class="btn btn-warning mt-3" onclick="self.location='{{ url('/simulador') }}'">Ir
																								para o simulador
																				</button>
																</div>
												</div>


				</div>
@endsection
