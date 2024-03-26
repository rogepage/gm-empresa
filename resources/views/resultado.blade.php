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
								<h1 class="text-center">Resultado</h1>



								<div class="col-md-8">
												<div id="chart_lucro_dell"></div>
								</div>

				</div>




</body>
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
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
								var data = google.visualization.arrayToDataTable([
												['', 'DELL', 'HP'],
												['1 tri', 1000, 400],
												['2 tri', 1170, 460],
												['3 tri', 660, 1120],
												['4 tri', 1030, 540]
								]);

								var options = {
												chart: {
																title: 'Lucro no ano',
																subtitle: 'Lucro obitido por cada empresa por trimestre',
												}
								};

								var chart = new google.charts.Bar(document.getElementById('chart_lucro_dell'));

								chart.draw(data, google.charts.Bar.convertOptions(options));
				}
</script>

</html>
