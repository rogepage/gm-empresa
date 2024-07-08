<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/res.estilo.css') }}" rel="stylesheet" />
    <title>Jogo Spartan</title>
    
</head>

<body>

	<div class="steps-container">
        <div class="step">
            <div class="circle gray">1</div>
            <div class="label">SIMULADOR</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)<=1? 'orange':'gray'}}">2</div>
            <div class="label">1a. JOGADA</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)>1? 'orange':'gray'}}">3</div>
            <div class="label">2a. JOGADA</div>
        </div>
    </div>
	

	
	<div class="container">

		<div class="results">
			<h2>RESULTADOS</h2>
			<br>
			<br>
			
			<table class="tb-jogada1">
				<tr>
					<td id="col"></td>
					<td id="dl">DELL</td>
					<td id="hp">HP</td>
				</tr>
				
				<tr>
					<td id="col">Quantidade vendida 1ª jogada</td>
					<td>{{$jogadas[0]->mercado_dell}}</td>
					<td>{{$jogadas[0]->mercado_hp}}</td>
				</tr>
				<tr>
					<td id="col">Preço de venda</td>
					<td>{{$jogadas[0]->dell_valor}}</td>
					<td>{{$jogadas[0]->hp_valor}}</td>
				</tr>
				<!-- <tr>
					<td id="col">Receita de venda</td>
					<td>2.516.000</td>
					<td>2.450.000</td>
				</tr>
				<tr>
					<td id="col">(-) Custo fabricação</td>
					<td>1.110.000</td>
					<td>1.050.000</td>
				</tr> -->
				<tr>
					<td id="col">(-) Despesas fixas</td>
					<td>{{$jogadas[0]->despesas_fixa_dell}}</td>
					<td>{{$jogadas[0]->despesas_fixa_hp}}</td>
				</tr>
				<tr>
					<td id="col">(=) Lucro</td>
					<td>{{($jogadas[0]->dell_valor*$jogadas[0]->mercado_dell) - $jogadas[0]->despesas_fixa_dell}}</td>
					<td>{{($jogadas[0]->hp_valor*$jogadas[0]->mercado_hp) - $jogadas[0]->despesas_fixa_hp}}</td>
				</tr>
			</table>
			

				<br>
				<br>
				<br>
			
			<table class="tb-jogada2">
				<tr>
					<td id="col">Quantidade vendida 2ª jogada</td>
					<td>{{isset($jogadas[1]) ?  $jogadas[1]->mercado_dell:''}}</td>
					<td>{{isset($jogadas[1]) ?  $jogadas[1]->mercado_hp:''}}</td>
				</tr>
				<tr>
					<td id="col">Preço de venda</td>
					<td>{{isset($jogadas[1]) ? $jogadas[1]->dell_valor:''}}</td>
					<td>{{isset($jogadas[1]) ? $jogadas[1]->hp_valor:''}}</td>
				</tr>
				<!-- <tr>
					<td id="col">Receita de venda</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td id="col">(-) Custo fabricação</td>
					<td></td>
					<td></td>
				</tr> -->
				<tr>
					<td id="col">(-) Despesas fixas</td>
					<td>{{isset($jogadas[1]) ?  $jogadas[1]->despesas_fixa_dell:''}}</td>
					<td>{{isset($jogadas[1]) ?  $jogadas[1]->despesas_fixa_hp : ''}}</td>
				</tr>
				<tr>
					<td id="col">(=) Lucro</td>
					<td>{{ isset($jogadas[1]) ?  (($jogadas[1]->dell_valor*$jogadas[1]->mercado_dell) - $jogadas[1]->despesas_fixa_dell):''}}</td>
					<td>{{ isset($jogadas[1]) ?  (($jogadas[1]->hp_valor*$jogadas[1]->mercado_hp) - $jogadas[1]->despesas_fixa_hp):''}}</td>
				</tr>

			</table>
			
			<br>
			<br>

			<table class="lucro-ac">
				<tr>
					<td id="col">Lucro acumulado</td>
					<td>{{$acumulado_dell}}</td>
					<td>{{$acumulado_hp}}</td>
				</tr>
			</table>

				

			<button class="back-button" id="btn-back">Voltar ao simulador</button>

			<script>
				document.getElementById('btn-back').onclick = function() {
					window.location.href = "{{url('simulador')}}"
				};
			</script>
			
		
	</div>
	
		
	
	
	
	


</body>


</html>