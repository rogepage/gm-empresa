<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->decimal('custo_direto', 8, 2)->default('1');
        });
    }

    // CREATE TABLE `parametro` (
    //     `id` int(2) NOT NULL AUTO_INCREMENT,
    //     `custo_direto` float(8,2) NOT NULL,
    //     `despesas_fixas` float(8,2) NOT NULL,
    //     `juros` int(2) NOT NULL,
    //     `fator_folha` decimal(6,5) DEFAULT NULL,
    //     `fator_propaganda` float(6,5) DEFAULT NULL,
    //     `elasticidade_produto` decimal(4,2) DEFAULT NULL,
    //     `ganho_mercado` int(5) DEFAULT NULL,
    //     `valor_maximo_produto` float(8,2) DEFAULT NULL,
    //     `grafico` int(1) DEFAULT NULL,
    //     `valor_investimento` double(10,2) DEFAULT NULL,
    //     `novo_custo_direto` decimal(10,2) DEFAULT NULL,
    //     `visualizar_investimento` int(1) DEFAULT NULL,
    //     `offline` int(1) DEFAULT NULL,
    //     PRIMARY KEY (`id`)
    //   ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
