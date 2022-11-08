<?php

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo "<p>ID:" . $c->id . "</p>";
        echo "<p>Nome:" . $c->nome . "</p>";
        echo "<p>Telefone:" . $c->telefone . "</p>";
        echo "<p>Rua:" . $c->endereco->rua . "</p>";
        echo "<p>Número:" . $c->endereco->numero . "</p>";
        echo "<p>Bairro:" . $c->endereco->bairro . "</p>";
        echo "<p>Cidade:" . $c->endereco->cidade . "</p>";
        echo "<p>UF:" . $c->endereco->uf . "</p>";
        echo "<p>CEP:" . $c->endereco->cep . "</p>";
        echo "<hr>";

    }
});
Route::get('/enderecos', function () {
    $ends = Endereco::all();
    foreach ($ends as $e) {
        echo "<p>Id do Cliente:" . $e->cliente_id . "</p>";
        echo "<p>Nome:" . $e->cliente->nome . "</p>";
        echo "<p>Telefone:" . $e->cliente->telefone . "</p>";
        echo "<p>Rua:" . $e->rua . "</p>";
        echo "<p>Número:" . $e->numero . "</p>";
        echo "<p>Bairro:" . $e->bairro . "</p>";
        echo "<p>Cidade:" . $e->cidade . "</p>";
        echo "<p>UF:" . $e->uf . "</p>";
        echo "<p>CEP:" . $e->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function () {
    $c = new Cliente();
    $c->nome = "Jose Antonio";
    $c->telefone = "48397490";
    $c->save();
    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 13;
    $e->bairro = "Centro";
    $e->cidade = "João Pessoa";
    $e->uf = "PB";
    $e->cep = "34890";

    $c->endereco()->save($e);

    $c = new Cliente();
    $c->nome = "Ana Maria";
    $c->telefone = "483990";
    $c->save();
    $e = new Endereco();
    $e->rua = "Av. do Brasil";
    $e->numero = 13;
    $e->bairro = "Centro";
    $e->cidade = "João Pessoa";
    $e->uf = "PB";
    $e->cep = "890";

    $c->endereco()->save($e);
});

Route::get('/clientes/json', function () {
//   $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if (count($cat) === 0)
        echo "<h4>Não tem nenhuma categoria cadastrada</h4>";
    else {
        foreach ($cat as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) === 0) {
        echo "<h4>Você nao possui nenhum produto cadastrado</h4>";
    } else {
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preco</td><td>Categoria</td></tr></thead>";
        echo "<tbody>";
        foreach ($prods as $p) {
            echo "<tr>";
            echo "<td>" . $p->nome . "</td>";
            echo "<td>" . $p->estoque . "</td>";
            echo "<td>" . $p->preco . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if (count($cat) === 0)
        echo "<h4>Não tem nenhuma categoria cadastrada</h4>";
    else {
        foreach ($cat as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
            $produtos = $c->produtos;

            if (count($produtos) > 0){
                echo "<ul>";
                foreach ($produtos as $p) {
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function (){
   $cats = Categoria::with('produto')->get();
   return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
   $p = new Produto();
   $p->nome = "Meu novo produto";
   $p->estoque = 10;
   $p->preco = 100;
   $p->categoria_id = 3;
   $p->save();
   return $p->toJson();
});



