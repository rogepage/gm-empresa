<?php

namespace App\Services;

use App\Models\Parametro;
use stdClass;

class SimuladorService
{
    public function __construct()
    {
    }


    public function simulaJogada(array $data): stdClass
    {

        // retorna do banco os parametros
        $obj = Parametro::find(1);


        // padroniza os valores em moedas
        $dell_valor = $this->converteMoedaFloat(isset($data['dell_valor']) ? $data['dell_valor'] : $this->valorProdRandomico());
        $hp_valor = $this->converteMoedaFloat(isset($data['hp_valor']) ? $data['hp_valor'] : $this->valorProdRandomico());
        $dell_folha = $this->converteMoedaFloat(isset($data['dell_folha']) ? $data['dell_folha'] : 0);
        $hp_folha = $this->converteMoedaFloat(isset($data['hp_folha']) ? $data['hp_folha'] : 0);
        $dell_publicidade = $this->converteMoedaFloat(isset($data['dell_publicidade']) ? $data['dell_publicidade'] : 0);
        $hp_publicidade = $this->converteMoedaFloat(isset($data['hp_publicidade']) ? $data['hp_publicidade'] : 0);
        $dell_investimento =  isset($data['dell_investimento']) ? true : false;
        $hp_investimento =  isset($data['hp_investimento']) ? true : false;

        $custo_direto = $this->converteMoedaFloat($obj->custo_direto);
        $valor_maximo_produto = $this->converteMoedaFloat($obj->valor_maximo_produto);
        $valor_investimento =  $this->converteMoedaFloat($obj->valor_investimento);
        $despesa_fixa  = $this->converteMoedaFloat($obj->despesa_fixa);





        $mercadoTotal = $this->calculaMercadoPrecoMenor(
            $dell_valor,
            $hp_valor,
            $obj->ganho_mercado,
            $obj->elasticidade_produto,
            $valor_maximo_produto
        );
        $mercadoMaiorValor = $this->calculaMercadoValorMaior(
            $dell_valor,
            $hp_valor,
            $obj->ganho_mercado,
            $obj->elasticidade_produto,
            $valor_maximo_produto
        );
        $mercadoMenorValor = $mercadoTotal - $mercadoMaiorValor;


        if ($dell_valor <= $hp_valor) {
            $mercadoDell = $mercadoMenorValor;
            $mercadoHP = $mercadoMaiorValor;
        } else {
            $mercadoDell = $mercadoMaiorValor;
            $mercadoHP = $mercadoMenorValor;
        }

        /********************** Dell ****************************/

        // folha Dell
        if ($dell_folha > 0) {
            $unitFolha = ($dell_folha * $obj->fator_folha);
            $mercadoDell = $mercadoDell + $unitFolha;
        }


        // propaganda Dell
        if ($dell_publicidade > 0) {
            $unitPropag = ceil((($mercadoDell * $dell_valor) * $obj->fator_propaganda) * ($dell_publicidade / 100));
            $mercadoDell = $mercadoDell + $unitPropag;
        }


        // calculando o lucro da DELL
        $receitaDell = ceil($mercadoDell * $dell_valor);


        $custoTotalDell = ($mercadoDell * $custo_direto);
        $aInvestDell = 0;
        if ($dell_investimento) {
            $custoTotalDell = ($mercadoDell * $custo_direto);
            $aInvestDell = $this->calculaDadosInvenstimento($valor_investimento, $obj->juros);
        }



        // deduzindo o valor de propagando da receita DELL

        $receitaDell = $receitaDell - ($receitaDell * ($dell_publicidade / 100));
        $margemDell = $receitaDell - $custoTotalDell;


        $lucroDellSemForm = $margemDell - $despesa_fixa - $aInvestDell;

        // deduzindo o valor da folha do lucro DELL
        $lucroDellSemForm = $lucroDellSemForm - ($dell_folha * $mercadoDell);


        /********************** HP ****************************/


        // folha hp
        if ($hp_folha > 0) {
            $unitFolha = ($hp_folha * $obj->fator_folha);
            $mercadoHP = $mercadoHP + $unitFolha;
        }

        // propaganda HP
        if ($hp_publicidade > 0) {
            $unitPropag = ceil((($mercadoHP * $hp_valor) * $obj->fator_propaganda) * ($hp_publicidade / 100));
            $mercadoHP = $mercadoHP + $unitPropag;
        }

        $receitaHP = $mercadoHP * $hp_valor;

        // deduzindo o valor de propagando do lucro DELL
        $receitaHP = $receitaHP - ($receitaHP * ($hp_publicidade / 100));

        $custoTotalHP = ($mercadoHP * $custo_direto);
        $aInvestHP = 0;

        if ($hp_investimento) {
            $custoTotalHP = ($mercadoHP * $custo_direto);
            $aInvestHP =  $this->calculaDadosInvenstimento($valor_investimento, $obj->juros);
        }

        $margemHP = $receitaHP - $custoTotalHP;
        $lucroHPSemForm = $margemHP - $despesa_fixa -  $aInvestHP;

        // deduzindo o valor da folha do lucro DELL
        $lucroHPSemForm = $lucroHPSemForm - ($hp_folha * $mercadoHP);


        // retornando os valores calculados para o simulador
        $simulador = new stdClass();
        $simulador->lucro_dell =  $lucroDellSemForm;
        $simulador->mercado_dell = round($mercadoDell);
        $simulador->mercado_hp = round($mercadoHP);
        $simulador->lucro_hp =  $lucroHPSemForm;
        $simulador->mercado = round($mercadoTotal);
        $simulador->dell_valor = $dell_valor;
        $simulador->hp_valor = $hp_valor;
        $simulador->valor_investimento = $valor_investimento;
        $simulador->hp_investe = $hp_investimento;
        $simulador->dell_investe = $dell_investimento;

        return $simulador;
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

    private function calculaDadosInvenstimento($investimento, $juros)
    {


        // if (strpos($investimento, ",") != false) {
        //     $investimento = $this->converteMoedaFloat($investimento);
        // }


        $depreciacao = ceil($investimento / 60) * 3;
        $jurosmensal = ceil((($juros / 12) / 100) * $investimento) * 3;


        $total = $depreciacao + $jurosmensal;
        // $aDados[0] = $depreciacao;
        // $aDados[1] = $jurosmensal;
        // $aDados[2] = $total;
        // $aDados[3] = $investimento;

        return $total;
    }

    private function valorProdRandomico()
    {
        return round(mt_rand(1800, 5500));
    }
}
