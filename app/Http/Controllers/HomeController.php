<?php

namespace App\Http\Controllers;


use App\Services\SimuladorService;
use App\Services\ParametrosService;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use stdClass;

class HomeController extends Controller
{

    public function __construct(
        protected readonly SimuladorService $simuladorService,
        protected readonly ParametrosService $parametrosService,

    ) {
    }

    public function simulador()
    {
        $parametro = $this->parametrosService->get();
        return view('simulador')->with('form', [])->with('simulador', false)->with('parametro', $parametro);
    }

    public function simular(Request $request)
    {
        $data = $request->all();
        $simulador = $this->simuladorService->simulaJogada($data);
        $parametro = $this->parametrosService->get();
        return view('simulador')->with('form', $data)->with('simulador', $simulador)->with('parametro', $parametro);
    }

    public function parametros()
    {
        $parametro = $this->parametrosService->get();
        return view('parametros')->with('parametro', $parametro);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $parametro = $this->parametrosService->get();
        $parametro->update($request->all());
        // return view('parametros')->with('parametro', $parametro)->with('sucesso', 'Parametros atualizados com sucesso');
        return back()
            ->with('sucesso', 'Parametros atualizados com sucesso');
    }

    public function reset()
    {
        $aData = [
            "custo_direto" => "1500.00",
            "despesa_fixa" => "500000.00",
            "juros" => "24",
            "fator_folha" => "0.8",
            "fator_propaganda" => "0.001",
            "valor_maximo_produto" => "5000.00",
            "valor_investimento" => "3300.00",
            "novo_custo_direto" => "1300.00",
            "ganho_mercado" => "200",
            "elasticidade_produto" => "0.8",
            "investimento" => "0"
        ];
        $parametro = $this->parametrosService->get();
        $parametro->update($aData);
        return back()
            ->with('sucesso', 'Reset de parametros realizado com sucesso');
    }
}
