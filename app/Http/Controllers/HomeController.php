<?php

namespace App\Http\Controllers;


use App\Services\SimuladorService;
use App\Services\ParametrosService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;
use stdClass;

class HomeController extends Controller
{

    public function __construct(
        protected readonly SimuladorService $simuladorService,
        protected readonly ParametrosService $parametrosService,

    ) {

    }

    public function home(Request $request)
    {
        $request->session()->forget('jogadas');
        return view('home');
    }

    public function simulador(Request $request)
    {
        $parametro = $this->parametrosService->get();
        $jogadas =  $request->session()->get('jogadas') ?? [];
        // var_dump($jogadas);
        return view('simulador')
            ->with('form', [])
            ->with('simulador', false)
            ->with('jogadas',$jogadas)
            ->with('parametro', $parametro);
    }

    public function simular(Request $request)
    {
      
        $jogadas =  $request->session()->get('jogadas') ?? [];
        // var_dump($jogadas);
        $data = $request->all();
        $simulador = $this->simuladorService->simulaJogada($data,$jogadas,true);
        $parametro = $this->parametrosService->get();
        return view('simulador')
                ->with('form', $data)
                ->with('simulador', $simulador)
                ->with('jogadas',$jogadas)
                ->with('parametro', $parametro);
    }

    public function parametros()
    {
        $parametro = $this->parametrosService->get();
        return view('parametros')->with('parametro', $parametro);
    }

    public function update(Request $request)
    {

        $parametro = $this->parametrosService->get();
        $parametro->update($request->all());
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

    public function inicio(Request $request)
    {
        $request->session()->forget('jogadas');
        $request->session()->forget('empresa');
        return redirect()->route('simulador');
    }

    public function reiniciar(Request $request)
    {
        $request->session()->forget('jogadas');
        $request->session()->forget('empresa');
        return redirect()->route('simulador');
    }

   

    public function jogadas(Request $request)
    {
        $jogadas =  $request->session()->get('jogadas') ?? [];
        $request->session()->put('empresa', 'Dell');
        return view('jogada')->with('jogadas', $jogadas)->with('empresa', $request->session()->get('empresa'));
    }

    public function jogada_gravar(Request $request)
    {
        $data = $request->all();
        $empresa = $request->session()->get('empresa');
        $jogadas =  $request->session()->get('jogadas') ?? [];
       
        $simulador = $this->simuladorService->simulaJogada($data,$jogadas, false, $empresa);


        if ($jogadas) {
            $jogadas = Arr::prepend($jogadas,  $simulador);
        } else {
            $jogadas = Arr::prepend([],  $simulador);
        }
        $request->session()->put('jogadas', $jogadas);


        
        return redirect()->route('resultado');
    }

    public function resultado(Request $request)
    {
        if(!$request->session()->has('jogadas')){
            return redirect()->route('simulador');
        }
        $jogadas =  array_reverse($request->session()->get('jogadas'));
        $acumulado_dell = 0;
        $acumulado_hp = 0;
        if(isset($jogadas[0])){
            $acumulado_dell += ($jogadas[0]->dell_valor*$jogadas[0]->mercado_dell) - (($jogadas[0]->custo_direto*$jogadas[0]->mercado_dell)-$jogadas[0]->despesas_fixa_dell);
            $acumulado_hp += ($jogadas[0]->hp_valor*$jogadas[0]->mercado_hp) - (($jogadas[0]->custo_direto*$jogadas[0]->mercado_hp)-$jogadas[0]->despesas_fixa_hp);
        }

        if(isset($jogadas[1])){
            $acumulado_dell += ($jogadas[1]->dell_valor*$jogadas[1]->mercado_dell) - (($jogadas[1]->custo_direto*$jogadas[1]->mercado_dell)-$jogadas[1]->despesas_fixa_dell);
            $acumulado_hp += ($jogadas[1]->hp_valor*$jogadas[1]->mercado_hp) - (($jogadas[1]->custo_direto*$jogadas[1]->mercado_hp)-$jogadas[1]->despesas_fixa_hp);
        }

    
        return view('resultado', compact('jogadas','acumulado_dell','acumulado_hp'));
    }
}
