<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 20;
        $order = $request->all()['order'] ?? null;
        if ($order !== null) {
          $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'desc';
        $where = $request->all()['where'] ?? [];
        $like = $request->all()['like'] ?? null;
        if ($like) {
          $like = explode(',', $like);
          $like[1] = '%' . $like[1] . '%';
        }
        $result = Order::orderBy($order[0], $order[1])
          ->where(function($query) use ($like) {
            if ($like) {
              return $query->where($like[0], 'like', $like[1]);
            }
            return $query;
          })
          ->where($where)
          ->with('client')
          ->with('coupon')
          ->paginate($limit);
        //dd($result);
        //exit;
        return view("admin.orders.index", compact('result'));
    }

    public function show($id)
    {
        $order = \App\Order::findOrFail($id);
        
        $items = \App\OrderItem::with('product')->where('order_id', '=', $id)->get();

        return view('admin.orders.show', compact('order', 'items')); 
    }

    public function atualizastatus(Request $request)
    {

      $order = \App\Order::findOrFail($request->all()['id']);

      $order->update(['status' => $request->all()['status']]);

      return back();
    }
}
