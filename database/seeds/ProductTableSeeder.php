<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		\App\Product::create([
	    	'title' => "Salmão com Molho de Maracujá",
	    	'description' => "Salmão com molho de maracujá, arroz integral, brocólis e cenoura.", 
	    	'price' => 24.99,
	    	'vd' => 350,
	    	'kcal' => 462,
	    	'kcal_grama' => 23,       
	    	'carboidrato' => 45,
	    	'carboidrato_grama' => 9,
	    	'proteina' => 40,
	    	'proteina_grama' => 8,
	    	'gorduras' => 10,
	    	'gorduras_grama' => 4.5,
	    	'liquido' => 0,
	    	'liquido_grama' => 0,
	    	'sodio' => 167,
	    	'sodio_grama' => 8,
	    	'category_id' => 1,
	    	'show_ini' => 1
	    ]);
	    \App\Product::create([
			'title' => "Filé Mignon ao Molho Mostarda",
			'description' => "Filé mignon com molho de mostarda, arroz integral 7 grãos e brócolis.",
			'price' => 24.00,
			'vd' => 350,
			'kcal' => 570,
			'kcal_grama' => 28,               
			'carboidrato' => 45,
			'carboidrato_grama' => 9,
			'proteina' => 56,
			'proteina_grama' => 11,
			'gorduras' => 18,
			'gorduras_grama' => 8,
			'liquido' => 0,
			'liquido_grama' => 0,
			'sodio' => 200,
			'sodio_grama' => 10,
			'category_id' => 1	
	    ]);
	    \App\Product::create([
			'title' => "Strogonoff de Frango Funcional",
			'description' => "Strogonoff de frango funcional, arroz integral e cenoura.",
			'price' => 19.00,
			'vd' => 350,
			'kcal' => 655,
			'kcal_grama' => 32,              
			'carboidrato' => 41,
			'carboidrato_grama' => 8,
			'proteina' => 76,
			'proteina_grama' => 15,
			'gorduras' => 20,
			'gorduras_grama' => 9,
			'liquido' => 0,
			'liquido_grama' => 0,
			'sodio' => 203,
			'sodio_grama' => 10,
			'category_id' => 1
		]);
		\App\Product::create([
	        'title' => "Filé de Saint Petter ao Leite de Coco",
	        'description' => "Filé de Saint Petter ao Leite de Coco com pure de cabotia e couve-flor com brocólis.",
	        'price' => 22.00,
	        'vd' => 350,
	        'kcal' => 280,
	        'kcal_grama' => 14,               
	        'carboidrato' => 18,
	        'carboidrato_grama' => 3,
	        'proteina' => 34,
	        'proteina_grama' => 7,
	        'gorduras' => 8,
	        'gorduras_grama' => 9,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 168,
	        'sodio_grama' => 10, 
	        'category_id' => 1,
	    	'show_ini' => 1
		]);
		\App\Product::create([
	        'title' => "Escalope de Mignon ao Molho de Ervilhas",
	        'description' => "Escalope de Mignon ao molho de ervilhas com grão de bico e couver-flor com cenoura.",
	        'price' => 24.00,
	        'vd' => 350,
	        'kcal' => 457,
	        'kcal_grama' => 25,               
	        'carboidrato' => 17,
	        'carboidrato_grama' => 3,
	        'proteina' => 50,
	        'proteina_grama' => 19,
	        'gorduras' => 21,
	        'gorduras_grama' => 9,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 127,
	        'sodio_grama' => 10,
	        'category_id' => 1,
	        'show_ini' => 0
		]);
		\App\Product::create([
	        'title' => "Frango Grelhado com Legumes",
	        'description' => "Peito de frango, brócolis e cenoura, sal light e especiarias.",
	        'price' => 14.50,
	        'vd' => 250,
	        'kcal' => 272, 
	        'kcal_grama' => 13,                
	        'carboidrato' => 9,
	        'carboidrato_grama' => 3,
	        'proteina' => 50,
	        'proteina_grama' => 67,
	        'gorduras' => 4,
	        'gorduras_grama' => 7,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 117,
	        'sodio_grama' => 5,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Frango Desfiado com Batata Doce",
	        'description' => "Peito de frango desfiado 150g, purê de batata doce 100g, sal light e especiarias.",
	        'price' => 14.50,
	        'vd' => 250,
	        'kcal' => 326, 
	        'kcal_grama' => 16,                
	        'carboidrato' => 27,
	        'carboidrato_grama' => 9,
	        'proteina' => 46,
	        'proteina_grama' => 62,
	        'gorduras' => 3,
	        'gorduras_grama' => 7,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 69,
	        'sodio_grama' => 7,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Frango Desfiado c/ Arroz Integral e Legumes",
	        'description' => "Peito de frango desfiado 150g, arroz integral, brócolis e cenoura 100g, sal light e especiarias.",
	        'price' => 14.50,
	        'vd' => 250,
	        'kcal' => 321, 
	        'kcal_grama' => 16,           
	        'carboidrato' => 23,
	        'carboidrato_grama' => 7,
	        'proteina' => 47,
	        'proteina_grama' => 63,
	        'gorduras' => 4,
	        'gorduras_grama' => 7,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 81,
	        'sodio_grama' => 3,
	        'category_id' => 2
    	]);
		\App\Product::create([
	        'title' => "Frango Desfiado c/ Arroz Integral e Legumes",
	        'description' => "Peito de frango desfiado 150g, arroz integral, brócolis e cenoura 100g, sal light e especiarias.",
	        'price' => 14.50,
	        'vd' => 250,
	        'kcal' => 321, 
	        'kcal_grama' => 16,                
	        'carboidrato' => 23,
	        'carboidrato_grama' => 7,
	        'proteina' => 47,
	        'proteina_grama' => 63,
	        'gorduras' => 4,
	        'gorduras_grama' => 7,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 81,
	        'sodio_grama' => 3,
	        'category_id' => 2
    	]);
		\App\Product::create([
	        'title' => "Patinho c/ Arroz Integral e Legumes",
	        'description' => "Patinho moído 150g, arroz integral, brócolis e cenoura 100g, sal light e especiarias.",
	        'price' => 15.50,
	        'vd' => 250,
	        'kcal' => 288, 
	        'kcal_grama' => 14,                
	        'carboidrato' => 23,
	        'carboidrato_grama' => 7,
	        'proteina' => 33,
	        'proteina_grama' => 44,
	        'gorduras' => 7,
	        'gorduras_grama' => 13,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 80,
	        'sodio_grama' => 3,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Patinho com Batata Doce",
	        'description' => "Patinho moído 150g, purê de batata doce 100g, sal light e especiarias.",
	        'price' => 15.50,
	        'vd' => 250,
	        'kcal' => 293, 
	        'kcal_grama' => 14,                
	        'carboidrato' => 27,
	        'carboidrato_grama' => 9,
	        'proteina' => 31,
	        'proteina_grama' => 42,
	        'gorduras' => 6,
	        'gorduras_grama' => 1,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 68,
	        'sodio_grama' => 3,
	        'category_id' => 2
    	]);
		\App\Product::create([
	        'title' => "Filé Mignon Grelhado com Legumes",
	        'description' => "Filé mignon grelhado com brócolis e cenoura.",
	        'price' => 20.00,
	        'vd' => 250,
	        'kcal' => 376, 
	        'kcal_grama' => 376,                
	        'carboidrato' => 9,
	        'carboidrato_grama' => 13,
	        'proteina' => 44,
	        'proteina_grama' => 67,
	        'gorduras' => 18,
	        'gorduras_grama' => 7,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 117,
	        'sodio_grama' => 5,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Nhoque de Batata Doce",
	        'description' => "Batata doce, amido de milho, patinho moído, molho de tomate light, sal light e especiarias",
	        'price' => 18.50,
	        'vd' => 400,
	        'kcal' => 537, 
	        'kcal_grama' => 25.5,                
	        'carboidrato' => 89,
	        'carboidrato_grama' => 18,
	        'proteina' => 25,
	        'proteina_grama' => 11,
	        'gorduras' => 9,
	        'gorduras_grama' => 4,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 200,
	        'sodio_grama' => 10,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Macarrão Integral com Carne Desfiada",
	        'description' => "Macarrão Integral, patinho desfiado, molho de tomate light, sal light e especiarias",
	        'price' => 18.50,
	        'vd' => 400,
	        'kcal' => 494, 
	        'kcal_grama' => 23.8,                
	        'carboidrato' => 77,
	        'carboidrato_grama' => 15,
	        'proteina' => 28.5,
	        'proteina_grama' => 6,
	        'gorduras' => 8,
	        'gorduras_grama' => 4,
	        'liquido' => 0,
	        'liquido_grama' => 0,
	        'sodio' => 219,
	        'sodio_grama' => 10.5,
	        'category_id' => 2,
	    	'show_ini' => 1
    	]);
		\App\Product::create([
	        'title' => "Caldo Verde",
	        'description' => "Couve com batata.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 159, 
	        'kcal_grama' => 8,                
	        'carboidrato' => 33,
	        'carboidrato_grama' => 6,
	        'proteina' => 4,
	        'proteina_grama' => 0.8,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 1.25,
	        'liquido_grama' => 0.5,
	        'sodio' => 11,
	        'sodio_grama' => 0.45,
	        'category_id' => 3
    	]);    	
		\App\Product::create([
	        'title' => "Canja de Galinha",
	        'description' => "Frango, arroz e legumes.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 245, 
	        'kcal_grama' => 12,                
	        'carboidrato' => 51,
	        'carboidrato_grama' => 10.2,
	        'proteina' => 6,
	        'proteina_grama' => 1.2,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 1.91,
	        'liquido_grama' => 0.8,
	        'sodio' => 35,
	        'sodio_grama' => 1.5,
	        'category_id' => 3
    	]);  
		\App\Product::create([
	        'title' => "Caldo de Mandioquinha com Carne",
	        'description' => "Mandioquinha com carne.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 402, 
	        'kcal_grama' => 20,                
	        'carboidrato' => 65,
	        'carboidrato_grama' => 13,
	        'proteina' => 20,
	        'proteina_grama' => 4,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 6.9,
	        'liquido_grama' => 3,
	        'sodio' => 11,
	        'sodio_grama' => 5,
	        'category_id' => 3
    	]);  
		\App\Product::create([
	        'title' => "Abóbora Detox",
	        'description' => "Abóbora e gengibre.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 139, 
	        'kcal_grama' => 7,                
	        'carboidrato' => 25,
	        'carboidrato_grama' => 5,
	        'proteina' => 3.5,
	        'proteina_grama' => 0.7,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 2.8,
	        'liquido_grama' => 1.3,
	        'sodio' => 10,
	        'sodio_grama' => 0.4,
	        'category_id' => 3
    	]);  
		\App\Product::create([
	        'title' => "Caldo de Brócolis",
	        'description' => "Brócolis e couve",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 92.8, 
	        'kcal_grama' => 5,                
	        'carboidrato' => 12.7,
	        'carboidrato_grama' => 2.5,
	        'proteina' => 6,
	        'proteina_grama' => 1.2,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 2,
	        'liquido_grama' => 0.9,
	        'sodio' => 58,
	        'sodio_grama' => 2,
	        'category_id' => 3
    	]);  
		\App\Product::create([
	        'title' => "Sopa Legumes com Carne",
	        'description' => "Sopa de legumes com carne.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 245, 
	        'kcal_grama' => 12,                
	        'carboidrato' => 51,
	        'carboidrato_grama' => 10.2,
	        'proteina' => 6,
	        'proteina_grama' => 1.2,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 1.91,
	        'liquido_grama' => 0.8,
	        'sodio' => 35,
	        'sodio_grama' => 1.5,
	        'category_id' => 3
    	]);  
		\App\Product::create([
	        'title' => "Sopa Legumes com Frango",
	        'description' => "Sopa de legumes com frango.",
	        'price' => 14.00,
	        'vd' => 350,
	        'kcal' => 245, 
	        'kcal_grama' => 12,                
	        'carboidrato' => 51,
	        'carboidrato_grama' => 10.2,
	        'proteina' => 6,
	        'proteina_grama' => 1.2,
	        'gorduras' => 0,
	        'gorduras_grama' => 0,
	        'liquido' => 1.91,
	        'liquido_grama' => 0.8,
	        'sodio' => 35,
	        'sodio_grama' => 1.5,
	        'category_id' => 3
    	]);      	    	    	    	    	    	
    }
}
/**
		\App\Product::create([
	        'title' => "",
	        'description' => "",
	        'price' => ,
	        'vd' => ,
	        'kcal' => , 
	        'kcal_grama' => ,                
	        'carboidrato' => ,
	        'carboidrato_grama' => ,
	        'proteina' => ,
	        'proteina_grama' => ,
	        'gorduras' => ,
	        'gorduras_grama' => ,
	        'liquido' => ,
	        'liquido_grama' => ,
	        'sodio' => ,
	        'sodio_grama' => ,
	        'category_id' => 1
    	]);
 **/