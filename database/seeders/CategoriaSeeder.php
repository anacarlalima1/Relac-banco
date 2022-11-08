<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nome'=> 'Roupas', 'id'=> 1]);
        DB::table('categorias')->insert(['nome'=> 'Eletrônicos', 'id'=> 2]);
        DB::table('categorias')->insert(['nome'=> 'Móveis', 'id'=>3]);
        DB::table('categorias')->insert(['nome'=> 'Informática', 'id'=> 4]);
    }
}
