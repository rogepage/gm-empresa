@extends('layout.site')

@section('content')
				<section class="section-internal-header">
								<div class="row">
												<div class="container">
																<div class="title">
																				<h2>Bem-vindo ao Jogos de Empresas</h2>
																</div>
												</div>
								</div>
				</section>

				<div class="container">

								<div class="row" style="padding: 10px">
												<div class="col-12">
																<p> A Dell e a HP em um jogo pela participação no mercado </p>
												</div>
								</div>
								<div class="row" style="padding: 10px">
												<div class="col-12">
																<img src="{{ asset('img/dellxhp.png') }}" alt="Imagem" class="img-fluid">
												</div>
								</div>
								<div class="row">
												<div class="col-md-6">
																<button type="button" class="btn btn-warning mt-3" onclick="self.location='{{ url('/inicio') }}'">Jogar
																</button>
												</div>
												<div class="col-md-6">
																<button type="button" class="btn btn-warning mt-3"
																				onclick="self.location='{{ url('/simulador') }}'">Simulador
																</button>
												</div>
								</div>
				</div>
@endsection
