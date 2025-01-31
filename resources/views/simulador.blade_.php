<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/estiloo.css" rel="stylesheet" />
        <title>Jogo Sparta</title>
    
</head>

<body>
    <div class="steps-container">
        <div class="step">
            <div class="circle orange">0</div>
            <div class="label">SIMULADOR</div>
        </div>
        <div class="line"></div>
         <div class="step">
            <div class="circle {{isset($jogadas[1])? 'orange':'gray'}}">1</div>
            <div class="label">1a. JOGADA</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{isset($jogadas[1])? 'orange':'gray'}}">2</div>
            <div class="label">2a. JOGADA</div>
        </div>
    </div>

    @if(count($jogadas)==1)
    <div>
        <h4>Encerrada</h4>
    </div>
    @endif

    <form action="{{ route('simulador.simular') }}" method="POST" id="form">
		@csrf

        <div>
            <img src="../imagens/dell.png" alt="Imagem" class="img-fluid" width="100" hspace="120">
            <img src="../imagens/hp.png" alt="Imagem" class="img-fluid" width="80" hspace="150">
        </div>
    <div class="main-container">        

        <table class="tabela" style="background-color: white">

                <tr>
                    <td><input type="text" class="form-control"
                        value="{{ old('dell_valor', isset($form['dell_valor']) ? $form['dell_valor'] : '3.500,00') }}"
                        id="dell_valor" name="dell_valor"	onkeyup="formatarMoeda(this)"></td>
                    <th style="background-color: #c8bfe7">PREÇO DE VENDA</th>
                    <td><input type="text" class="form-control" id="hp_valor" name="hp_valor"
                        value="{{ old('hp_valor', isset($form['hp_valor']) ? $form['hp_valor'] : '3.500,00') }}"
                        onkeyup="formatarMoeda(this)"></td>
                </tr>

                <tr>
                    <td><input type="text" class="form-control"
                        value="{{ old('dell_folha', isset($form['dell_folha']) ? $form['dell_folha'] : '') }}"
                        id="dell_folha" name="dell_folha"   onkeyup="formatarMoeda(this)"></td>
                    <th>QUALIDADE</th>
                    <td><input type="text" class="form-control" id="hp_folha" name="hp_folha"
                        value="{{ old('hp_folha', isset($form['hp_folha']) ? $form['hp_folha'] : '') }}"
                        onkeyup="formatarMoeda(this)"></td>
                </tr>

                <tr>
                    <td ><input type="text" class="form-control"
                        value="{{ old('dell_publicidade', isset($form['dell_publicidade']) ? $form['dell_publicidade'] : '') }}"
                        id="dell_publicidade" name="dell_publicidade"  onkeyup="formatarMoeda(this)"></td>
                    <th style="background-color: #c8bfe7">PROPAGANDA<br>(Percentual do faturamento)</th>
                    <td>  <input type="text" class="form-control" id="hp_publicidade"
                        value="{{ old('hp_publicidade', isset($form['hp_publicidade']) ? $form['hp_publicidade'] : '') }}"
                        name="hp_publicidade" onkeyup="formatarMoeda(this)"></td>
                </tr>

                <tr>
                    <td style="background-color: #ffc90e"><div class="result">
                        <input style="background-color: #ffc90e" type="text" id="mercado_dell" value="{{$simulador? $simulador->mercado_dell:''}}" readonly>
                    </div></td>
                    <th style="color: red">UNIDADES VENDIDAS</th>
                    <td style="background-color: #ffc90e"><div class="result">
                        <input style="background-color: #ffc90e" type="text" id="mercado_hp" value="{{$simulador ? $simulador->mercado_hp:''}}" readonly>
                    </div></td>
                </tr>
            </table>
            <!--
            <div class="info">
            
               
                !--<label for="campo1" class="form-label">Preço de venda</label>--
				<input type="text" class="form-control"
                value="{{ old('dell_valor', isset($form['dell_valor']) ? $form['dell_valor'] : '3.500,00') }}"
                id="dell_valor" name="dell_valor"	onkeyup="formatarMoeda(this)">
            <br>
            
            !--<label for="campo2" class="form-label">Qualidade</label>--
            <input type="text" class="form-control"
                value="{{ old('dell_folha', isset($form['dell_folha']) ? $form['dell_folha'] : '') }}"
                id="dell_folha" name="dell_folha"   onkeyup="formatarMoeda(this)">
            <br>
              
            !--<label for="campo3" class="form-label">Propaganda</label>--
            <input type="text" class="form-control"
                value="{{ old('dell_publicidade', isset($form['dell_publicidade']) ? $form['dell_publicidade'] : '') }}"
                id="dell_publicidade" name="dell_publicidade"  onkeyup="formatarMoeda(this)">
        </div>
            -->
            

           
			

           <!-- <div class="result">
                <input type="text" id="mercado_dell" value="{{$simulador? $simulador->mercado_dell:''}}" readonly>
            </div>-->
           
        

        <!--<div class="textos">
            <input type="text" value="Preço de venda"><br>
            <input type="text" value="Qualidade"><br>
            <input type="text" value="Propaganda"><br>
            <input type="text" value="Unidades vendidas">
            
            
        </div>

        <div class="column">
			<img src="{{ asset('img/hp.png') }}" alt="Imagem" class="img-fluid" width="100">
            <div class="info">
                
				!--<label for="campo4" class="form-label">Preço de venda</label>--
				<input type="text" class="form-control" id="hp_valor" name="hp_valor"
					value="{{ old('hp_valor', isset($form['hp_valor']) ? $form['hp_valor'] : '3.500,00') }}"
					onkeyup="formatarMoeda(this)">
                <br>
                
                !--<label for="campo5" class="form-label">Qualidade</label>--
                <input type="text" class="form-control" id="hp_folha" name="hp_folha"
                    value="{{ old('hp_folha', isset($form['hp_folha']) ? $form['hp_folha'] : '') }}"
                    onkeyup="formatarMoeda(this)">
                <br>
                
                !--<label for="campo6" class="form-label">Propaganda</label>--
                <input type="text" class="form-control" id="hp_publicidade"
                    value="{{ old('hp_publicidade', isset($form['hp_publicidade']) ? $form['hp_publicidade'] : '') }}"
                    name="hp_publicidade" onkeyup="formatarMoeda(this)">
            </div>-->
           
            
			
            
           
           <!-- <div class="result">
                <input type="text" id="mercado_hp" value="{{$simulador ? $simulador->mercado_hp:''}}" readonly>
            </div>-->
        

    </div>

    <div class="button-container">
        <button class="simulate-button" type="submit">Simular</button>
    </div>

   
    

    </form>
    <script>

        // Adiciona um evento de clique a todos os campos do formulário
        document.querySelectorAll('input, textarea, select').forEach(function(field) {
            field.addEventListener('click', function() {
                document.getElementById('mercado_hp').value = '';
                document.getElementById('mercado_dell').value = '';
            });
        });
       
        document.getElementById("dell_valor").focus();
        const formulario = document.getElementById('form');
 
         // Adiciona o evento de keypress aos campos de entrada
         formulario.addEventListener('keypress', function(event) {
             // Verifica se a tecla pressionada é o Enter (código 13)
             if (event.key === 'Enter') {
                 event.preventDefault(); 
                 formulario.submit();   
             }
         });
 
 
     </script>
    <br>
    <div>

       

        @if(count($jogadas)<2)
        <button class="jogada-button" id="btn" onClick="event.preventDefault(); window.location = '{{ route('jogadas') }}';">
            Quero fazer a  @labelJogada(count($jogadas)) jogada

        </button>
       
        @endif
    </div>

    <br>
    @if(count($jogadas)>=1)
    
        <button class="jogada-button" id="btn3" onClick="event.preventDefault(); window.location = '{{ route('jogadas.reiniciar') }}';">
           Reiniciar partida
        </button>
    @endif
</div>


   <br>
    @if(count($jogadas)>0)
    <?php /* <div>
        <button class="results-button" id="btn2" onClick="event.preventDefault(); window.location = '{{ route('resultado') }}';">Ver resultados da @labelJogada(count($jogadas)-1) jogada</button>
    </div> */ ?>

    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
        <iframe src="{{ route('resultado', ['display' => 0]) }}" 
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                allowfullscreen>
        </iframe>
    </div>
    
    @endif
    


</form>
</div>



</body>
</html>