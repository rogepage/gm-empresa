<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    use HasFactory;
    protected $fillable = [

        "custo_direto",
        "despesa_fixa",
        "juros",
        "fator_folha",
        "fator_propaganda",
        "valor_maximo_produto",
        "valor_investimento",
        "novo_custo_direto",
        "ganho_mercado",
        "elasticidade_produto",
        "investimento"
    ];


    // public function bannerByOrder()
    // {
    //     $this->select("*")->orderBy('ordem')->get();
    // }
}
