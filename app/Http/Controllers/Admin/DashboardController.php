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

        return view('admin.dashboard.index', compact('orders', 'openOrders', 'paymentOrders'));
    }
}
