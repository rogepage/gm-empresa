<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <title>Spartansite</title>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Simulador</h1>
    <form action="{{ route('simulador.simular') }}" method="POST" id="quickForm" >
      @csrf
  
    <div class="row">
      
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dell</h5>
              {{-- <form> --}}
                <div class="mb-3">
                  <label for="campo1" class="form-label">Preço (R$)</label>
                  <input type="text" class="form-control" value="{{ old('dell_valor',isset($form['dell_valor']) ? $form['dell_valor'] :  '') }}"  id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo2" class="form-label">Folha de pagamento (R$)</label>
                  <input type="text" class="form-control" value="{{ old('dell_folha',isset($form['dell_folha']) ? $form['dell_folha']:  '') }}"   id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo3" class="form-label">Publicidade (%)</label>
                  <input type="text" class="form-control" value="{{ old('dell_publicidade',isset($form['dell_publicidade']) ? $form['dell_publicidade'] :  '') }}"  id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2,4" onkeyup="formatarMoeda(this)">
                </div>
              
                @if($simulador && isset($form['dell_valor']) )
                <div class="col-md-4">
                  <div class="p-3 mb-3 {{$simulador->lucro_dell >0 ? 'bg-success' : 'bg-warning' }}  text-white">Lucro: {{money($simulador->lucro_dell, 'BRL')}}</div>
                </div>

                <div class="col-md-4">
                  <div class="p-3 mb-3 bg-light text-dark">Mercado: {{$simulador->mercado_dell}}</div>
                </div>
                @endif
               
              {{-- </form> --}}
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">HP</h5>
              {{-- <form> --}}
                <div class="mb-3">
                  <label for="campo4" class="form-label">Preço (R$)</label>
                  <input type="text" class="form-control" id="hp_valor" name="hp_valor" value="{{ old('hp_valor',isset($form['hp_valor']) ? $form['hp_valor'] :  '') }}"  placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo5" class="form-label">Folha de pagamento (R$)</label>
                  <input type="text" class="form-control" id="hp_folha" name="hp_folha" value="{{ old('hp_folha',isset($form['hp_folha']) ? $form['hp_folha'] : '') }}" placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo6" class="form-label">Publicidade (%)</label>
                  <input type="text" class="form-control" id="hp_publicidade" value="{{ old('hp_publicidade',isset($form['hp_publicidade']) ? $form['hp_publicidade'] : '') }}"  name="hp_publicidade" placeholder="ex: 3" onkeyup="formatarMoeda(this)">
                </div>
                @if($simulador && isset($form['hp_valor']))
                <div class="col-md-4">
                  <div class="p-3 mb-3 {{$simulador->lucro_hp >0 ? 'bg-success' : 'bg-warning' }}  text-white">Lucro: {{money($simulador->lucro_hp, 'BRL') }}</div>
                </div>

                <div class="col-md-4">
                  <div class="p-3 mb-3 bg-light text-dark">Mercado: {{$simulador->mercado_hp}}</div>
                </div>
                @endif

               
              {{-- </form> --}}
            </div>
          </div>
        </div>
      
     
      
      

      {{-- <div class="row">
        <div class="col-md-4">
          <canvas id="grafico1"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="grafico2"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="grafico3"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <canvas id="grafico4"></canvas>
        </div>
      </div> --}}
      
    </div>
    <div class="row">
         <button type="submit" class="btn btn-primary mt-3">Simular</button>
    <div>
    <form>
      
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
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
        if(valor == 'NaN') elemento.value = '';
    }
</script>
</body>
</html>
