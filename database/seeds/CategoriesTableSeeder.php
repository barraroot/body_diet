<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['category' => 'Linha Premium', 'show' => 1]);
        \App\Category::create(['category' => 'Linha Fitness', 'show' => 1]);
        \App\Category::create(['category' => 'Caldos', 'show' => 1]);
    }
}
