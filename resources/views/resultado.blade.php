<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/res.estilo.css') }}" rel="stylesheet" />
    <title>Jogo Spartan</title>
    
</head>

<body>
	@if($display==1)
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
	@endif
	

	@if($display==1)
	<div class="container" style="border: 2px solid red; min-width: 550px;">
	@else
	<div class="container2" style="border: 0px solid red;">
	@endif

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
					<td id="col">Preço de venda</td>
					<td>@money($jogadas[0]->dell_valor??0, 'BRL')</td>
					<td>@money($jogadas[0]->hp_valor??0, 'BRL') </td>
				</tr>
				<tr>
					<td id="col">Qualidade</td>
					<td>@money($jogadas[0]->folha_dell??0, 'BRL')</td>
					<td>@money($jogadas[0]->folha_hp??0, 'BRL') </td>
				</tr>

				<tr>
					<td id="col">Propaganda</td>
					<td>{{$jogadas[0]->publicidade_dell??0}}%</td>
					<td>{{$jogadas[0]->publicidade_hp??0}}%</td>
				</tr>

				<tr>
					<td id="col">Quantidade vendida 1ª jogada</td>
					<td>{{$jogadas[0]->mercado_dell??0}}</td>
					<td> {{$jogadas[0]->mercado_hp}}</td>
				</tr>

				
				 
				<tr>
					<td id="col">Receita de venda </td>
					<td>@money(($jogadas[0]->dell_valor*$jogadas[0]->mercado_dell)??0, 'BRL')</td>
					<td>@money(($jogadas[0]->hp_valor*$jogadas[0]->mercado_hp)??0, 'BRL') </td>
				</tr>
				<tr>
					<td id="col">(-) Custo de fabricação </td>
					<td> @money(($jogadas[0]->custo_total_dell)??0, 'BRL')</td>
					<td> @money(($jogadas[0]->custo_total_hp)??0, 'BRL')</td>
				</tr>
				<tr>
					<td id="col">(-) Despesas fixas</td>
					<td> @money($jogadas[0]->despesas_fixa_dell??0, 'BRL')</td>
					<td> @money($jogadas[0]->despesas_fixa_hp??0, 'BRL')</td>
				</tr>
				<tr>
					<td id="col">(=) Lucro</td>
					<td> @money($jogadas[0]->lucro_dell, 'BRL')</td>
					<td>@money($jogadas[0]->lucro_hp, 'BRL')</td>
				</tr>
			</table>
			

				<br>
				<br>
				<br>
			
			<table class="tb-jogada2">
				
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
					<td id="col">Qualidade</td>
					<td>@if (isset($jogadas[1]))  @money($jogadas[1]->folha_dell??0, 'BRL') @endif</td>
					<td>@if (isset($jogadas[1])) @money($jogadas[1]->folha_hp??0, 'BRL') @endif</td>
				</tr>

				<tr>
					<td id="col">Propaganda</td>
					<td>@if (isset($jogadas[1])) {{$jogadas[1]->publicidade_dell??0}}% @endif</td>
					<td>@if (isset($jogadas[1])) {{$jogadas[1]->publicidade_hp??0}}% @endif</td>
				</tr>

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
						   @money($jogadas[1]->custo_total_dell, 'BRL')
						@endif
					</td>
					<td> 
						@if(isset($jogadas[1])) 
						   @money($jogadas[1]->custo_total_hp, 'BRL')
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
							  @money($jogadas[1]->lucro_dell, 'BRL')
						@endif
						</td>
						
					<td>
						@if (isset($jogadas[1])) 
							  @money($jogadas[1]->lucro_hp, 'BRL')
						@endif
					</td>
				</tr>

			</table>
			
			<br>
			<br>

			<table class="lucro-ac">
				<tr>
					<td id="col">Lucro acumulado</td>
					@php
					$acumladoDell = $jogadas[0]->lucro_dell + (isset($jogadas[1]->lucro_dell) ? $jogadas[1]->lucro_dell :0);
					$acumuladoHp = $jogadas[0]->lucro_hp + (isset($jogadas[1]->lucro_hp) ? $jogadas[1]->lucro_hp :0);
					@endphp
					<td>@money($acumladoDell, 'BRL') </td>
					<td>@money($acumuladoHp, 'BRL')</td>
				</tr>
			</table>

				
			@if($display==1)
				<button class="back-button" id="btn-back">Voltar ao simulador</button>

				<script>
					document.getElementById('btn-back').onclick = function() {
						window.location.href = "{{url('simulador')}}"
					};
				</script>
			@endif
			
		
	</div>
	
		
	
	
	
	


</body>


</html>