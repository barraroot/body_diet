<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class ProductController extends AppController
{
    public function __construct(\App\Product $model)
    {
        $this->model = $model;
        $this->localView = 'product';
        $this->routerController = 'products';
        $this->listBox = ['category' => [\App\Category::class, 'id', 'category']];
        $this->resultView = [];
    }

    public function beforeSave(Request $request)
    {
        $this->trataCampoDecimal('price');
        $this->trataCampoDecimal('kcal');
        $this->trataCampoDecimal('kcal_grama');
        $this->trataCampoDecimal('carboidrato');
        $this->trataCampoDecimal('carboidrato_grama');
        $this->trataCampoDecimal('proteina');
        $this->trataCampoDecimal('proteina_grama');
        $this->trataCampoDecimal('gorduras');
        $this->trataCampoDecimal('gorduras_grama');
        $this->trataCampoDecimal('liquido');
        $this->trataCampoDecimal('liquido_grama');
        $this->trataCampoDecimal('sodio');
        $this->trataCampoDecimal('sodio_grama');
    }

    public function afterSave(Request $request, $result)
    {
        request()->validate([

            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = $result->id .'.'. request()->foto->getClientOriginalExtension();
        $imageMiniName = $result->id .'_mini.'. request()->foto->getClientOriginalExtension();
        $save_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'produtos';

        $request->file('foto')->move($save_path, $imageName);

        $img = \Image::make($save_path . DIRECTORY_SEPARATOR . $imageName);
        if($img->width() > 380)
        {
            $img->resize(380, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        if($img->height() > 380)
        {
            $img->resize(null, 380, function ($constraint) {
                $constraint->aspectRatio();
            });
        }        

        $img->save($save_path . DIRECTORY_SEPARATOR . $imageName);

        $imgMini = \Image::make($save_path . DIRECTORY_SEPARATOR . $imageName);

        $imgMini->resize(null, 80, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imgMini->save($save_path . DIRECTORY_SEPARATOR . $imageMiniName);

        $data['id'] = $result->id;
        $data['img'] = $imageName;
        $data['img_mini'] = $imageMiniName;

        $result->update($data);

        //$request->file('foto')->move($save_path, $imageName);
    }

    public function beforeDelete($result)
    {
        $retorno = true;

        $order_items = \App\OrderItem::where('product_id', '=', $result->id)->get();
        if(count($order_items) > 0)
        {
            session()->flash('message', 'Este produto já foi vendido na loja, não pode ser excluido.');
            $retorno = false;
        }

        return $retorno;
    }

    public function statusProduto($id, $status)
    {
        $status = $status == 1 ? 0 : 1;
        $produto = \App\Product::findOrFail($id);
        $produto->update(['ativo' => $status]);

        return redirect()->route('adminproducts.index')->with('message', 'Produto '. $produto->title .', '. ($status == 1 ? "Ativo" : "Inativo") .' com sucesso.');        
    }

    public function afterEdit(&$result)
    {
        $this->trataCampoDecimalEdit($result, 'price');
        $this->trataCampoDecimalEdit($result, 'kcal');
        $this->trataCampoDecimalEdit($result, 'kcal_grama');
        $this->trataCampoDecimalEdit($result, 'carboidrato');
        $this->trataCampoDecimalEdit($result, 'carboidrato_grama');
        $this->trataCampoDecimalEdit($result, 'proteina');
        $this->trataCampoDecimalEdit($result, 'proteina_grama');
        $this->trataCampoDecimalEdit($result, 'gorduras');
        $this->trataCampoDecimalEdit($result, 'gorduras_grama');
        $this->trataCampoDecimalEdit($result, 'liquido');
        $this->trataCampoDecimalEdit($result, 'liquido_grama');
        $this->trataCampoDecimalEdit($result, 'sodio');
        $this->trataCampoDecimalEdit($result, 'sodio_grama');        
    } 
}