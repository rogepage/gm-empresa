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
    <div class="row">
        <form>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dell</h5>
              <form>
                <div class="mb-3">
                  <label for="campo1" class="form-label">Preço</label>
                  <input type="text" class="form-control" id="dell_valor" name="dell_valor" placeholder="ex: 1.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo2" class="form-label">Folha de pagamento</label>
                  <input type="text" class="form-control"  id="dell_folha" name="dell_folha" placeholder="ex: 4.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo3" class="form-label">Publicidade</label>
                  <input type="text" class="form-control" id="dell_publicidade" name="dell_publicidade" placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">HP</h5>
              <form>
                <div class="mb-3">
                  <label for="campo4" class="form-label">Preço</label>
                  <input type="text" class="form-control" id="hp_preco" name="hp_preco" placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo5" class="form-label">Folha de pagamento</label>
                  <input type="text" class="form-control" id="hp_folha" name="hp_folha" placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
                <div class="mb-3">
                  <label for="campo6" class="form-label">Publicidade</label>
                  <input type="text" class="form-control" id="hp_publicidade" name="hp_publicidade" placeholder="ex: 2.500,00" onkeyup="formatarMoeda(this)">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Simular</button>
      <form>
      
      

      <div class="row">
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
      </div>
    </div>
      
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
