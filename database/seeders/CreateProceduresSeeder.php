<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProceduresSeeder extends Seeder
{
    public function run(): void
    {
        // Verifica se a procedure já existe
        $exists = DB::selectOne("
            SELECT ROUTINE_NAME
            FROM INFORMATION_SCHEMA.ROUTINES
            WHERE ROUTINE_SCHEMA = DATABASE()
            AND ROUTINE_TYPE = 'PROCEDURE'
            AND ROUTINE_NAME = 'insert_produtos_bulk'
        ");

        if ($exists) {
            // Já existe → não faz nada
            return;
        }

        // Cria a procedure
        DB::unprepared("
            CREATE PROCEDURE insert_produtos_bulk(IN json_data JSON)
            BEGIN
                DECLARE total INT DEFAULT 0;
                DECLARE i INT DEFAULT 0;

                -- quantidade de itens no JSON
                SET total = JSON_LENGTH(json_data);

                WHILE i < total DO
                    INSERT INTO produtos (nome, descricao, preco, estoque, categoria_id, img_url, created_at, updated_at)
                    VALUES (
                        JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$[', i, '].nome'))),
                        JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$[', i, '].descricao'))),
                        JSON_EXTRACT(json_data, CONCAT('$[', i, '].preco')),
                        JSON_EXTRACT(json_data, CONCAT('$[', i, '].estoque')),
                        JSON_EXTRACT(json_data, CONCAT('$[', i, '].categoria_id')),
                        JSON_UNQUOTE(JSON_EXTRACT(json_data, CONCAT('$[', i, '].img_url'))),
                        NOW(),
                        NOW()
                    );

                    SET i = i + 1;
                END WHILE;
            END;
        ");
    }
}
