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
                  <input type="text" class="form-control" value="{{ old('dell_valor',isset($form['dell_valor']) ? $form['dell_valor'] :  '')}}"  id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo2" class="form-label">Folha de pagamento (R$)</label>
                  <input type="text" class="form-control" value="{{ old('dell_folha',isset($form['dell_folha']) ? $form['dell_folha']:  '') }}"   id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo3" class="form-label">Publicidade (%)</label>
                  <input type="text" class="form-control" value="{{ old('dell_publicidade',isset($form['dell_publicidade']) ? $form['dell_publicidade'] :  '') }}"  id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2,4" onkeyup="formatarMoeda(this)">
                </div>
                @if($parametro->investimento==1)
                <div class="mb-3">
                  <label for="campo3" class="form-label">Investir em linha de produção?</label>
                  <select class="form-control" name="dell_investimento" id="combo_dell_investe">
                    <option value="0" {{ old('dell_investimento',isset($form['dell_investimento'])? $form['dell_investimento'] : 0) == '0' ? 'selected' : '' }}> Não
                    </option>
                    <option value="1" {{ old('dell_investimento',isset($form['dell_investimento'])? $form['dell_investimento'] : 0) == '1' ? 'selected' : '' }}> Sim
                    </option>
                  </select> 
                </div>

                <div class="mb-3" id="dell_investe" style="display: none">
                  <label for="campo3" class="form-label">Valor a ser investido:  R$ {{$parametro->valor_investimento}}</label>
                </div>
                @endif
              
                @if($simulador)
                <div class="col-md-4">
                  <div class="p-3 mb-3 {{$simulador->lucro_dell >0 ? 'bg-success' : 'bg-warning' }}  text-white">Lucro: {{money($simulador->lucro_dell, 'BRL')}}</div>
                </div>

                <div class="col-md-4">
                  <div class="p-3 mb-3 bg-light text-dark">Mercado: {{$simulador->mercado_dell}}</div>
                </div>

                <div class="col-md-4">
                  <div id="chart_lucro_dell"></div>
                </div>

                <div class="col-md-4">
                  <div id="chart_mercado_dell"></div>
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
                @if($parametro->investimento==1)
                <div class="mb-3">
                  <label for="campo3" class="form-label">Investir em linha de produção?</label>
                  <select class="form-control" name="hp_investimento" id="combo_hp_investe">
                    <option value="0" {{ old('hp_investimento',isset($form['hp_investimento'])? $form['hp_investimento'] : 0) == '0' ? 'selected' : '' }}> Não
                    </option>
                    <option value="1" {{ old('hp_investimento',isset($form['hp_investimento'])? $form['hp_investimento'] : 0) == '1' ? 'selected' : '' }}> Sim
                    </option>
                  </select> 
                </div>

                <div class="mb-3" id="hp_investe" style="display: none">
                  <label for="campo3" class="form-label">Valor a ser investido:  R$ {{$parametro->valor_investimento}}</label>
                </div>
                @endif
                @if($simulador)
                <div class="col-md-4">
                  <div class="p-3 mb-3 {{$simulador->lucro_hp >0 ? 'bg-success' : 'bg-warning' }}  text-white">Lucro: {{money($simulador->lucro_hp, 'BRL') }}</div>
                </div>

                <div class="col-md-4">
                  <div class="p-3 mb-3 bg-light text-dark">Mercado: {{$simulador->mercado_hp}}</div>
                </div>

                <div class="col-md-4">
                  <div id="chart_lucro_hp"></div>
                </div>

                <div class="col-md-4">
                  <div id="chart_mercado_hp"></div>
                </div>
                @endif

               
              {{-- </form> --}}
            </div>
          </div>
        </div>
      
     
      
      

      
    <div class="row">
         <button type="submit" class="btn btn-primary mt-3">Simular</button>
    <div>
    <form>

      <div class="row">
        <button type="button" class="btn btn-warning mt-3" onclick="self.location='{{url('/parametros')}}'">Parâmetros do jogo</button>
      <div>

     
      
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 

<script>
  $( "#combo_dell_investe" )
    .on( "change", function() { 
      
      if(this.value == 1){
        $('#dell_investe').show()

      }else{
        $('#dell_investe').hide()
      }
    
    } );

    $( "#combo_hp_investe" )
    .on( "change", function() { 
      if(this.value == 1){
        $('#hp_investe').show()
      }else{
        $('#hp_investe').hide()
      }
    } );
  </script>
  


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
@if(isset($simulador->lucro_dell))
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['bar']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChartDell);
  google.charts.setOnLoadCallback(drawChartHP);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChartDell() {
        var data = google.visualization.arrayToDataTable([
          ['', ''],
          ['DELL', {{isset($simulador->lucro_dell)? $simulador->lucro_dell:0}}]
        ]);
        var cordeg = '{{$simulador->lucro_dell>0 ? '#0000FF': '#004411' }}';
        var cor = '{{$simulador->lucro_dell>0 ? 'blue': 'red'}}';
        
        var options = {
          colors: [cor, cordeg],
          chart: {
            title: 'Lucro',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('chart_lucro_dell'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChartHP() {
        var data = google.visualization.arrayToDataTable([
          ['', ''],
          ['HP', {{isset($simulador->lucro_hp)? $simulador->lucro_hp:0}}]
        ]);
        var cordeg = '{{$simulador->lucro_hp>0 ? '#0000FF': '#004411' }}';
        var cor = '{{$simulador->lucro_hp>0 ? 'blue': 'red'}}';
        
        var options = {
          colors: [cor, cordeg],
          chart: {
            title: 'Lucro',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('chart_lucro_hp'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


      google.charts.load('current', {packages: ['corechart', 'line']});
      google.charts.setOnLoadCallback(drawBasicDell);
      google.charts.setOnLoadCallback(drawBasicHP);

      function drawBasicDell() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'X');
            data.addColumn('number', 'Valor');

            data.addRows([
              [{{$simulador->mercado_dell}}, {{$simulador->dell_valor}}],[{{$simulador->mercado}},0]
            ]);

            var options = {
              hAxis: {
                title: 'Unidades'
              },
              vAxis: {
                title: 'Valor'
              }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_mercado_dell'));

            chart.draw(data, options);
          }


          function drawBasicHP() {

              var data = new google.visualization.DataTable();
              data.addColumn('number', 'X');
              data.addColumn('number', 'Valor');

              data.addRows([
                [{{$simulador->mercado_hp}}, {{$simulador->hp_valor}}],[{{$simulador->mercado}},0]
              ]);

              var options = {
                hAxis: {
                  title: 'Unidades'
                },
                vAxis: {
                  title: 'Valor'
                }
              };

              var chart = new google.visualization.LineChart(document.getElementById('chart_mercado_hp'));

              chart.draw(data, options);
            }



</script>
@endif
</body>
</html>
