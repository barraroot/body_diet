<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Faqs::create(['title' => 'Como preparamos nossas refeições?', 'description' => 'Nós escolhemos e compramos os melhores ingredientes do mercado. Peparamos em nossa cozinha as receitas saudáveis elaboradas por nutricionistas. As refeições são feitas sem conservantes e corantes, com baixo teor de sódio e gordura. Proporcionamos e embalamos com alta qualidade, através de um processo de congelamento, que mantém a qualidade do alimento e as propriedades nutricionais dele.']);
        \App\Faqs::create(['title' => 'Como comprar?', 'description' => 'Você pode vir até o nosso ponto comercial: Rua 6, nº 426, Entre Av 13 e 15, Jd Dona Angela - Centro Pode pedir via WhatsApp (19) 9 99700.8001 que entregamos até você. (Entregas para fora de Rio Claro - SP, favor consultar tarifa de frete). Decida como prefere pagar: Cartão de crédito/débito, Vale refeição Alelo ou Dinheiro Escolha se quer receber em casa ou retirar o pedido nas nossas lojas']);
        \App\Faqs::create(['title' => 'Como entregamos?', 'description' => 'Temos uma equipe de motoboys para levar a refeição com todo cuidado até você. A taxa de entrega cobrada na cidade de Rio Claro é R$ 3,00 Se preferir retirar na loja, pode vir quando preferir.']);
        \App\Faqs::create(['title' => 'O que fazer com nossas refeições?', 'description' => 'Armazene suas refeições em casa ou trabalho e garanta que sempre terá refeições saudáveis e gostosas durante sua semana. Aqueça DE 4 A 6 minutos no microondas e PRONTO! Sugestão: retire a refeição da embalagem e monte no prato. Fica muito mais apetitoso!']);
        \App\Faqs::create(['title' => 'Por que as refeições da Body Diet vão ser muito legais na sua vida?', 'description' => 'Você emagrece com saúde, comendo refeições saborosas; Deixa de comer “bobagens” por não ter opções saudáveis; Ganha tempo para fazer outras coisas que você gosta; Não fica mais na fila do supermercado; Diminui o desperdício; Não lava louça.']);
        \App\Faqs::create(['title' => 'Nossa tecnologia de preparação:', 'description' => 'Nossa cozinha conta com fornos combinados, que utilizam o vapor de água para dar mais sabor às receitas. Temos congeladores rápidos que ajudam manter os nutrientes e embalagens práticas e profissionais, próprias para micro-ondas. Além disso a body diet aposta na tecnologia para vender refeições de um jeito muito fácil e dinâmico. Nossos clientes podem escolher seu pratos de acordo com suas preferências e receberem em casa tudo pronto. Aguardamos seu pedido saudável.']);
    }
}
