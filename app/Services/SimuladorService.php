<?php

namespace App\Services;

use App\Models\Parametro;
use Ramsey\Uuid\Type\Decimal;

class SimuladorService
{
    public function __construct()
    {
    }


    public function simulaJogada(array $data)
    {

        $obj = Parametro::find(1);


        // dd($obj);

        $dell_valor = $this->converteMoedaFloat($data['dell_valor']);
        $hp_valor = $this->converteMoedaFloat($data['hp_valor']);

        $dell_folha = $this->converteMoedaFloat($data['dell_folha'] ?: 0);
        $hp_folha = $this->converteMoedaFloat($data['hp_folha'] ?: 0);
        $dell_publicidade = $this->converteMoedaFloat($data['dell_publicidade'] ?: 0);
        $hp_publicidade = $this->converteMoedaFloat($data['hp_publicidade'] ?: 0);



        $mercadoMenorValor = $this->calculaMercadoPrecoMenor(
            $dell_valor,
            $hp_valor,
            $obj->ganho_mercado,
            $obj->elasticiade_produto,
            $obj->valor_maximo_produto
        );
        $mercadoMaiorValor = $this->calculaMercadoValorMaior(
            $dell_valor,
            $hp_valor,
            $obj->ganho_mercado,
            $obj->elasticiade_produto,
            $obj->valor_maximo_produto
        );
        $mercadoMenorValor = $mercadoMenorValor - $mercadoMaiorValor;

        if ($dell_valor <= $hp_valor) {
            $mercadoDell = $mercadoMenorValor;
            $mercadoHP = $mercadoMaiorValor;
        } else {
            $mercadoDell = $mercadoMaiorValor;
            $mercadoHP = $mercadoMenorValor;
        }


        if ($dell_folha > 0) {
            $unitFolha = floor((int) $_POST['dell_folha'] * $obj->fatorFolha);
            $mercadoDell = $mercadoDell + $unitFolha;
        }

        // folha hp
        if ($hp_folha > 0) {
            $unitFolha = floor((int) $_POST['hp_folha'] * $obj->fatorFolha);
            $mercadoHP = $mercadoHP + $unitFolha;
        }

        // propaganda Dell
        if ($dell_publicidade > 0) {
            $unitPropag = ceil((($mercadoDell * $dell_valor) * $obj->fator_propaganda) * ($dell_publicidade / 100));
            $mercadoDell = $mercadoDell + $unitPropag;
        }

        // propaganda HP
        if ($hp_publicidade > 0) {
            $unitPropag = ceil((($mercadoHP * $hp_valor) * $obj->fator_propaganda) * ($hp_publicidade / 100));
            $mercadoHP = $mercadoHP + $unitPropag;
        }




        //     "id" => 1
        // "custo_direto" => 1500
        // "despesa_fixa" => 500
        // "juros" => 24
        // "fator_folha" => 0.8
        // "fator_propaganda" => 0.001
        // "valor_maximo_produto" => 5000
        // "valor_investimento" => 3300
        // "novo_custo_direto" => 1300
        // "ganho_mercado" => 200
        // "grafico" => 1
        // "offline" => 1
        // "elasticiade_produto" => 0.8
    }


    private function calculaMercadoPrecoMenor($dellPreco, $hpPreco, $ganhoMercado, $elasticidadeProduto, $valorMaximoProduto)
    {

        if ($dellPreco <= $hpPreco) {
            $menor = $dellPreco;
        } else {
            $menor = $hpPreco;
        }
        $qt = $ganhoMercado + ($valorMaximoProduto - $menor) * $elasticidadeProduto;
        return $qt;
    }

    private function calculaMercadoValorMaior($dellPreco, $hpPreco, $ganhoMercado, $elasticidadeProduto, $valorMaximoProduto)
    {
        if ($dellPreco >= $hpPreco) {
            $maiorValor = $dellPreco;
        } else {
            $maiorValor = $hpPreco;
        }
        $qt = ($ganhoMercado + ($valorMaximoProduto - $maiorValor) * $elasticidadeProduto) / 2;
        return $qt;
    }

    private function converteMoedaFloat($valor)
    {
        $valor1 = str_replace(".", "", $valor);
        $valor2 = str_replace(",", ".", $valor1);
        return (float) $valor2;
    }
}
