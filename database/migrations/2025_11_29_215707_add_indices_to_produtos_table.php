<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Índice no nome (buscas rápidas)
            $table->index('nome', 'produtos_nome_index');

            // Índice no preço (filtros e ordenações)
            $table->index('preco', 'produtos_preco_index');

            // Índice na data de criação (ordenar por data)
            $table->index('created_at', 'produtos_created_at_index');

            // FULLTEXT para busca real (nome + descrição)
            // Obs: só funciona em MySQL >= 5.6 InnoDB
            $table->fullText(['nome', 'descricao'], 'produtos_fulltext');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropIndex('produtos_nome_index');
            $table->dropIndex('produtos_preco_index');
            $table->dropIndex('produtos_created_at_index');
            $table->dropFullText('produtos_fulltext');
        });
    }
};
