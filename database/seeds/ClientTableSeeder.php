<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['name' => 'Pagseguro Client Test', 'cpf' => '37036595809', 'email' => 'c14968716610083209672@sandbox.pagseguro.com.br', 'senha' => '123', 'cep' => '13500180', 'endereco' => 'Rua 5', 'numero' => '1331', 'complemento' => '', 'cidade' => 'Rio Claro', 'estado' => 'SP', 'telefone' => '(19)3523-7976', '(19)99880-6611']);
    }
}
