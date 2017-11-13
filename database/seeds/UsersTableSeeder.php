<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Fabio Ratky',
        	'email' => 'contato@bodydiet.com.br',
        	'password' => bcrypt('123')
        ]);      
        factory(\App\User::class)->create([
            'name' => 'Lucas Carvalho',
            'email' => 'barraroot@gmail.com',
            'password' => bcrypt('123')
        ]);           
    }
}
