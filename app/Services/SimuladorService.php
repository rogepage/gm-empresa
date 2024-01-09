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

        $obj = Parametro::find(1);


        $dell_valor = $this->converteMoedaFloat($data['dell_valor']);
        $hp_valor = $this->converteMoedaFloat($data['hp_valor']);

        $dell_folha = $this->converteMoedaFloat($data['dell_folha'] ?: 0);
        $hp_folha = $this->converteMoedaFloat($data['hp_folha'] ?: 0);
        $dell_publicidade = $this->converteMoedaFloat($data['dell_publicidade'] ?: 0);
        $hp_publicidade = $this->converteMoedaFloat($data['hp_publicidade'] ?: 0);
        $dell_investimento =  isset($data['dell_investimento']) ? true : false;
        $hp_investimento =  isset($data['hp_investimento']) ? true : false;



        $mercadoTotal = $this->calculaMercadoPrecoMenor(
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
        $mercadoMenorValor = $mercadoTotal - $mercadoMaiorValor;


        if ($dell_valor <= $hp_valor) {
            $mercadoDell = $mercadoMenorValor;
            $mercadoHP = $mercadoMaiorValor;
        } else {
            $mercadoDell = $mercadoMaiorValor;
            $mercadoHP = $mercadoMenorValor;
        }


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


        $custoTotalDell = ($mercadoDell * $obj->custo_direto);
        $aInvestDell = 0;
        if ($dell_investimento) {
            $custoTotalDell = ($mercadoDell * $obj->novo_custo_direto);
            $aInvestDell = $this->calculaDadosInvenstimento($obj->valor_investimento, $obj->juros);
        }

        // deduzindo o valor de propagando da receita DELL

        $receitaDell = $receitaDell - ($receitaDell * ($dell_publicidade / 100));
        $margemDell = $receitaDell - $custoTotalDell;


        $lucroDellSemForm = $margemDell - $obj->despesa_fixa - $aInvestDell;

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

        $custoTotalHP = ($mercadoHP * $obj->custo_direto);
        $aInvestHP = 0;

        if ($hp_investimento) {
            $custoTotalHP = ($mercadoHP * $obj->novo_custo_direto);
            $aInvestHP =  $this->calculaDadosInvenstimento($obj->valor_investimento, $obj->juros);
        }

        $margemHP = $receitaHP - $custoTotalHP;
        $lucroHPSemForm = $margemHP - $obj->despesa_fixa -  $aInvestHP;

        // deduzindo o valor da folha do lucro DELL
        $lucroHPSemForm = $lucroHPSemForm - ($hp_folha * $mercadoHP);



        $similador = new stdClass();
        $similador->lucro_dell =  $lucroDellSemForm;
        $similador->mercado_dell = $mercadoDell;
        $similador->mercado_hp = $mercadoHP;
        $similador->lucro_hp =  $lucroHPSemForm;
        return $similador;
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


        if (strpos($investimento, ",") != false) {
            $investimento = $this->converteMoedaFloat($investimento);
        }


        $depreciacao = ceil($investimento / 60) * 3;
        $jurosmensal = ceil((($juros / 12) / 100) * $investimento) * 3;


        $total = $depreciacao + $jurosmensal;
        $aDados[0] = $depreciacao;
        $aDados[1] = $jurosmensal;
        $aDados[2] = $total;
        $aDados[3] = $investimento;

        return $aDados;
    }
}
