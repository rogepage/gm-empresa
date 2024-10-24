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
            <div class="circle gray">0</div>
            <div class="label">SIMULADOR</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)<=1? 'orange':'gray'}}">1</div>
            <div class="label">1a. JOGADA</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)>1? 'orange':'gray'}}">2</div>
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
					<td>{{$jogadas[0]->mercado_dell??0}}</td>
					<td> {{$jogadas[0]->mercado_hp}}</td>
				</tr>
				<tr>
					<td id="col">Preço de venda</td>
					<td>@money($jogadas[0]->dell_valor??0, 'BRL')</td>
					<td>@money($jogadas[0]->hp_valor??0, 'BRL') </td>
				</tr>
				<tr>
					<td id="col">Receita de venda</td>
					<td>@money(($jogadas[0]->dell_valor*$jogadas[0]->mercado_dell)??0, 'BRL')</td>
					<td>@money(($jogadas[0]->hp_valor*$jogadas[0]->mercado_hp)??0, 'BRL') </td>
				</tr>
				<tr>
					<td id="col">(-) Custo de fabricação </td>
					<td> @money(($jogadas[0]->custo_direto*100)??0, 'BRL')</td>
					<td> @money(($jogadas[0]->custo_direto*100)??0, 'BRL')</td>
				</tr>
				<tr>
					<td id="col">(-) Despesas fixas</td>
					<td> @money($jogadas[0]->despesas_fixa_dell??0, 'BRL')</td>
					<td> @money($jogadas[0]->despesas_fixa_hp??0, 'BRL')</td>
				</tr>
				<tr>
					<td id="col">(=) Lucro</td>
					@php $dellLucro1 = (($jogadas[0]->dell_valor*$jogadas[0]->mercado_dell) - (($jogadas[0]->custo_direto*$jogadas[0]->mercado_dell) - $jogadas[0]->despesas_fixa_dell))@endphp
					<td> @money($dellLucro1, 'BRL')</td>
					@php $hpLucro1 = (($jogadas[0]->hp_valor*$jogadas[0]->mercado_hp) - (($jogadas[0]->custo_direto*$jogadas[0]->mercado_hp) - $jogadas[0]->despesas_fixa_hp)) @endphp
					<td>@money($hpLucro1, 'BRL')</td>
				</tr>
			</table>
			

				<br>
				<br>
				<br>
			
			<table class="tb-jogada2">
				<tr>
					<td id="col">Quantidade vendida 2ª jogada</td>
					<td> @if (isset($jogadas[1])) 
						  {{$jogadas[1]->mercado_dell}}
						 @endif
					</td>
					<td>
						@if (isset($jogadas[1])) 
						  {{$jogadas[1]->mercado_hp}}
						 @endif
					</td>
				</tr>
				<tr>
					<td id="col">Preço de venda</td>
					<td>
						@if (isset($jogadas[1])) 
						  @money($jogadas[1]->dell_valor, 'BRL')
						 @endif
						</td>
					<td>
						@if (isset($jogadas[1])) 
						  @money($jogadas[1]->hp_valor, 'BRL')
						@endif
					</td>
				</tr>
				<tr>
					<td id="col">Receita de venda</td>
					<td>
						@if(isset($jogadas[1])) 
							@money($jogadas[1]->dell_valor*$jogadas[1]->mercado_dell, 'BRL')
						@endif
					</td>
					<td>
						@if(isset($jogadas[1])) 
						   @money($jogadas[1]->hp_valor*$jogadas[1]->mercado_hp, 'BRL') 
						@endif
					</td>
				</tr>
				<tr>
					<td id="col">(-) Custo de fabricação </td>
					<td> 
						@if(isset($jogadas[1])) 
						   @money($jogadas[1]->custo_direto*100, 'BRL')
						@endif
					</td>
					<td> 
						@if(isset($jogadas[1])) 
						@money($jogadas[1]->custo_direto*100, 'BRL')
					 @endif
					</td>
				</tr>
				<tr>
					<td id="col">(-) Despesas fixas</td>
					<td>
						@if (isset($jogadas[1])) 
						  @money( $jogadas[1]->despesas_fixa_dell, 'BRL')
						@endif
						</td>
					<td>
						@if (isset($jogadas[1])) 
						  @money($jogadas[1]->despesas_fixa_hp, 'BRL')
						@endif
						</td>
				</tr>
				<tr>
					<td id="col">(=) Lucro</td>
					<td>
						@if (isset($jogadas[1])) 
						  @php $dellValor2 = (($jogadas[1]->dell_valor*$jogadas[1]->mercado_dell) - (($jogadas[1]->custo_direto*$jogadas[1]->mercado_dell)-$jogadas[1]->despesas_fixa_dell)) @endphp
						  @money($dellValor2, 'BRL')
						@endif
						</td>
					<td>
						@if (isset($jogadas[1])) 
						  @php $hpValor2 = (($jogadas[1]->hp_valor*$jogadas[1]->mercado_hp) - (($jogadas[1]->custo_direto*$jogadas[1]->mercado_hp)-$jogadas[1]->despesas_fixa_hp)) @endphp
						  @money($hpValor2, 'BRL')
						@endif
					</td>
				</tr>

			</table>
			
			<br>
			<br>

			<table class="lucro-ac">
				<tr>
					<td id="col">Lucro acumulado</td>
					<td>@money($acumulado_dell, 'BRL') </td>
					<td>@money($acumulado_hp, 'BRL')</td>
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