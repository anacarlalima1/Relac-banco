<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            [ 'nome' => 'Camiseta Polo', 'preco' => 100,
                'estoque' => 4, 'categoria_id' => 1,]);
        DB::table('produtos')->insert(
            ['nome' => 'Calça Jeans', 'preco' => 88,
                'estoque' => 44, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
            ['nome' => 'Computador', 'preco' => 865,
                'estoque' => 27, 'categoria_id' => 4]);
        DB::table('produtos')->insert(
            ['nome' => 'Smartphone', 'preco' => 333,
                'estoque' => 77, 'categoria_id' => 2]);
        DB::table('produtos')->insert(
            ['nome' => 'Sofá', 'preco' => 467,
                'estoque' => 54, 'categoria_id' => 4]);
        DB::table('produtos')->insert(
            ['nome' => 'Guarda Roupa', 'preco' => 223,
                'estoque' => 89, 'categoria_id' => 4]);
        DB::table('produtos')->insert(
            ['nome' => 'Fone de Ouvido', 'preco' => 23,
                'estoque' => 97, 'categoria_id' => 2]);

    }
}
