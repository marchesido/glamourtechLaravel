<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFunctionsSeeder extends Seeder
{
    public function run(): void
    {
        // Verifica se a função já existe
        $exists = DB::selectOne("
            SELECT ROUTINE_NAME
            FROM INFORMATION_SCHEMA.ROUTINES
            WHERE ROUTINE_SCHEMA = DATABASE()
            AND ROUTINE_TYPE = 'FUNCTION'
            AND ROUTINE_NAME = 'verificar_estoque'
        ");

        if ($exists) {
            // Já existe, então não faz nada
            return;
        }

        // Cria a função apenas se não existir
        DB::unprepared("
            CREATE FUNCTION verificar_estoque(produtoId INT, qtd INT)
            RETURNS TINYINT
            DETERMINISTIC
            BEGIN
                DECLARE estoque_atual INT;

                SELECT estoque INTO estoque_atual
                FROM produtos
                WHERE id = produtoId;

                IF estoque_atual IS NULL THEN
                    RETURN 0;
                END IF;

                IF estoque_atual < qtd THEN
                    RETURN 0;
                END IF;

                RETURN 1;
            END;
        ");
    }
}
