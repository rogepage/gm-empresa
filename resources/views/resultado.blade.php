@extends('layout.site')

@section('content')
				<div class="container">
								<h1 class="text-center">Resultado</h1>

								<div class="col-md-12">
												<div id=""> Vencedor:

																@if (
																				$jogadas[0]->lucro_dell + $jogadas[1]->lucro_dell + $jogadas[2]->lucro_dell + $jogadas[3]->lucro_dell >
																								$jogadas[0]->lucro_hp + $jogadas[1]->lucro_hp + $jogadas[2]->lucro_hp + $jogadas[3]->lucro_hp)
																				<strong> DELL </strong>
																@else
																				<strong> HP</strong>
																@endif

												</div>
								</div>
								<br>
								<br>

								<div class="container">
												<div class="row">
																<div class="col-sm">
																				<div id="chart_lucro_trimestral" style="width: 500px; height: 500px;"></div>
																</div>
																<div class="col-sm">
																				<div id="chart_mercado" style="width: 500px; height: 500px;"></div>
																</div>
																{{-- 
																<div class="col-sm">
																				<div id="chart_lucro" style="width: 500px; height: 500px;"></div>
																</div> --}}

												</div>
								</div>



				</div>


				</body>
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
				<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

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

				<script type="text/javascript">
								google.charts.load("current", {
												packages: ['corechart', 'bar']
								});

								google.charts.setOnLoadCallback(drawChartLucro);
								// google.charts.setOnLoadCallback(drawCharLucroTotal);
								google.charts.setOnLoadCallback(drawChartMercado);


								function drawChartLucro() {
												var data = google.visualization.arrayToDataTable([
																['12 meses', 'DELL', 'HP'],
																['1 trimestre', {{ $jogadas[0]->lucro_dell }}, {{ $jogadas[0]->lucro_hp }}],
																['2 trimestre', {{ $jogadas[1]->lucro_dell }}, {{ $jogadas[1]->lucro_hp }}],
																['3 trimestre', {{ $jogadas[2]->lucro_dell }}, {{ $jogadas[2]->lucro_hp }}],
																['4 trimestre', {{ $jogadas[3]->lucro_dell }}, {{ $jogadas[3]->lucro_hp }}]
												]);

												var options = {
																chart: {
																				title: 'Lucro por trimestre',
																				subtitle: 'Lucro obitido por cada empresa por trimestre',
																}

												};

												var chart = new google.charts.Bar(document.getElementById('chart_lucro_trimestral'));

												chart.draw(data, google.charts.Bar.convertOptions(options));
								}


								function drawCharLucroTotal() {
												var data = google.visualization.arrayToDataTable([
																['12 meses', 'DELL', 'HP'],
																['ano',
																				{{ $jogadas[0]->lucro_dell + $jogadas[1]->lucro_dell + $jogadas[2]->lucro_dell + $jogadas[3]->lucro_dell }},
																				{{ $jogadas[0]->lucro_hp + $jogadas[1]->lucro_hp + $jogadas[2]->lucro_hp + $jogadas[3]->lucro_hp }}
																]
												]);

												var options = {
																chart: {
																				title: 'Lucro total',
																				subtitle: 'Somatória do lucro de todos os trimestres',
																},
																bars: 'horizontal' // Required for Material Bar Charts.
												};

												var chart = new google.charts.Bar(document.getElementById('chart_lucro'));

												chart.draw(data, google.charts.Bar.convertOptions(options));
								}

								function drawChartMercado() {
												var data = google.visualization.arrayToDataTable([
																['Task', 'Hours per Day'],
																['DELL',
																				{{ $jogadas[0]->mercado_dell + $jogadas[1]->mercado_dell + $jogadas[2]->mercado_dell + $jogadas[3]->mercado_dell }}
																],
																['HP',
																				{{ $jogadas[0]->mercado_hp + $jogadas[1]->mercado_hp + $jogadas[2]->mercado_hp + $jogadas[3]->mercado_hp }}
																]
												]);

												var options = {
																title: 'Ganho de mercado',
																is3D: true,
												};

												var chart = new google.visualization.PieChart(document.getElementById('chart_mercado'));
												chart.draw(data, options);
								}
				</script>
@endsection
