<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cities::create(['city' => 'Rio Claro', 'frete' => 0.00]);
        \App\Cities::create(['city' => 'Limeira', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Piracicaba', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Araras', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Campinas', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Sumaré', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Americana', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Jundiaí', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'São Paulo', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Hortolandia', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Nova Odessa', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Santa Barbara D´Oeste', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Valinhos', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Vinhedo', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Barueri', 'frete' => 20.00]);
        \App\Cities::create(['city' => 'Osasco', 'frete' => 20.00]);

    }
}
