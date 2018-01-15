<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
    	$orders = Order::orderBy('id', 'desc')->with('client')->paginate(8);

    	$openOrders = Order::where('status', '=', 'Pendente')->get();

    	$paymentOrders = Order::where('status', '=', 'Aguardando Pagamento')->get();

    	$maisVendidos = \DB::select("select order_items.product_id, products.title, products.price, Count(order_items.qtde) as quantidade from order_items left join products on order_items.product_id = products.id group by order_items.product_id, products.title having Count(order_items.product_id) > 1 order by 4 desc limit 0,10");

        return view('admin.dashboard.index', compact('orders', 'openOrders', 'paymentOrders', 'maisVendidos'));
    }
}
