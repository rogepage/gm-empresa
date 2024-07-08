<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('css/estilo.css') }}" rel="stylesheet" />
    <title>Jogo Sparta</title>
    
</head>

<body>
    <div class="steps-container">
        <div class="step">
            <div class="circle orange">1</div>
            <div class="label">SIMULADOR</div>
        </div>
        <div class="line"></div>
         <div class="step">
            <div class="circle {{isset($jogadas[1])? 'orange':'gray'}}">2</div>
            <div class="label">1a. JOGADA</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{isset($jogadas[1])? 'orange':'gray'}}">3</div>
            <div class="label">2a. JOGADA</div>
        </div>
    </div>

    <form action="{{ route('simulador.simular') }}" method="POST" id="form">
		@csrf
    <div class="main-container">
        <div class="column">
            <img src="{{ asset('img/dell.png') }}" alt="Imagem" class="img-fluid" width="100">
            <div class="info">
                <label for="campo1" class="form-label">Preço de venda</label>
				<input type="text" class="form-control"
					value="{{ old('dell_valor', isset($form['dell_valor']) ? $form['dell_valor'] : '') }}"
					id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00"
					onkeyup="formatarMoeda(this)">
                <label for="campo2" class="form-label">Qualidade</label>
                <input type="text" class="form-control"
                    value="{{ old('dell_folha', isset($form['dell_folha']) ? $form['dell_folha'] : '') }}"
                    id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00"
                    onkeyup="formatarMoeda(this)">
                <label for="campo3" class="form-label">Propaganda</label>
                <input type="text" class="form-control"
                    value="{{ old('dell_publicidade', isset($form['dell_publicidade']) ? $form['dell_publicidade'] : '') }}"
                    id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2,4"
                    onkeyup="formatarMoeda(this)">
            </div>

            <br>
            <br>
            <img id="seta" src="https://cdn-icons-png.freepik.com/512/10238/10238537.png" width="50"
								height="50" />
            <br>
			

            <div class="result">
                <span>unidades vendidas</span>
                <input type="text" value="{{$simulador? $simulador->mercado_dell:''}}">
            </div>
        </div>
       

        <div class="column">
			<img src="{{ asset('img/hp.png') }}" alt="Imagem" class="img-fluid" width="100">
            <div class="info">
                <label for="campo4" class="form-label">Preço de venda</label>
				<input type="text" class="form-control" id="hp_valor" name="hp_valor"
					value="{{ old('hp_valor', isset($form['hp_valor']) ? $form['hp_valor'] : '') }}"
					placeholder="ex: 2.500,00" 
                    onkeyup="formatarMoeda(this)">
                <label for="campo5" class="form-label">Qualidade</label>
                <input type="text" class="form-control" id="hp_folha" name="hp_folha"
                    value="{{ old('hp_folha', isset($form['hp_folha']) ? $form['hp_folha'] : '') }}"
                    placeholder="ex: 2.500,00" 
                    onkeyup="formatarMoeda(this)">
                <label for="campo6" class="form-label">Propaganda</label>
                <input type="text" class="form-control" id="hp_publicidade"
                    value="{{ old('hp_publicidade', isset($form['hp_publicidade']) ? $form['hp_publicidade'] : '') }}"
                    name="hp_publicidade" placeholder="ex: 3" 
                    onkeyup="formatarMoeda(this)">
            </div>
            <br>
            <br>
            <img id="seta" src="https://cdn-icons-png.freepik.com/512/10238/10238537.png" width="50"
								height="50" />
            <br>
			

            <div class="result">
                <span>unidades vendidas</span>
                <input type="text" value="{{$simulador ? $simulador->mercado_hp:''}}">
            </div>
        </div>

    </div>

    <div class="button-container">
        <button class="simulate-button" type="submit">Simular</button>
    </div>

   
    

    </form>
    <script>
       
        // document.getElementById('btn').onclick = function() {
        //     window.location.href = "{{url('jogadas')}}"
        // };

        // document.getElementById('btn2').onclick = function() {
        //     window.location.href = "{{url('resultado')}}"
        // };


    </script>
    <div>
        @if(count($jogadas)<2)
        <button class="jogada-button" id="btn" onClick="event.preventDefault(); window.location = '{{ route('jogadas') }}';">
            Realizar  {{count($jogadas)+1}}a. jogada
        </button>
        @else
            <button class="jogada-button" id="btn3" onClick="event.preventDefault(); window.location = '{{ route('jogadas.reiniciar') }}';">
               Reiniciar partida
            </button>
        @endif
    </div>


   
    @if(count($jogadas)>0)
    <div>
        <button class="results-button" id="btn2" onClick="event.preventDefault(); window.location = '{{ route('resultado') }}';">Mostrar resultados</button>
    </div>
    @endif
    


</form>
</div>



</body>
</html>