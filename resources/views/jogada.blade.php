<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo Sparta</title>
 
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    
</head>
   

<body>
	<div class="steps-container">
        <div class="step">
            <div class="circle gray">0</div>
            <div class="label">SIMULADOR </div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)==0? 'orange':'gray'}}">1</div>
            <div class="label">1a. JOGADA</div>
        </div>
        <div class="line"></div>
        <div class="step">
            <div class="circle {{count($jogadas)==1? 'orange':'gray'}}">2</div>
            <div class="label">2a. JOGADA</div>
        </div>
    </div>

	

<div class="container">
		<form action="{{ route('jogada.gravar') }}" method="POST" id="quickForm">
			@csrf
			@if (isset($sucesso))
			<div class="alert alert-success">
				<p>{{ $sucesso }}</p>
	
				<p>Agora realize a {{ count($jogadas) + 1 }} &#170; rodada</p>
			</div>
			@endif
	
			            <img src="{{ asset('img/dell.png') }}" alt="Imagem" class="img-fluid" width="100">

	<div class="form-container">
		
		
		<form>
			<div class="mb-3">
				<label  for="campo1" class="form-label">Preço de venda</label>
				<input id="preco" type="text" class="form-control"
					value="{{ old('dell_valor', isset($form['dell_valor']) ? $form['dell_valor'] : '') }}"
					id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00"
					onkeyup="formatarMoeda(this)">
			</div>

			<div class="mb-3">
				<label  for="campo2" class="form-label">Qualidade</label>
				<input id="quali" type="text" class="form-control"
					value="{{ old('dell_folha', isset($form['dell_folha']) ? $form['dell_folha'] : '') }}"
					id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00"
					onkeyup="formatarMoeda(this)">
			</div>

			<div class="mb-3">
				<label  for="campo3" class="form-label">Propaganda</label>
				<input id="prop" type="text" class="form-control"
					value="{{ old('dell_publicidade', isset($form['dell_publicidade']) ? $form['dell_publicidade'] : '') }}"
					id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2,4"
					onkeyup="formatarMoeda(this)">
			</div>

			<button id="btn-go" type="submit">Confirma</button>

			
		</form>
	</div>

</div>

	
</body>

