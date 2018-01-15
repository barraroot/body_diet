<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;

class AppController extends Controller
{
    protected $model;
    protected $localView;
    protected $routerController;
    protected $listBox = [];
    protected $resultView;
    protected $defaultOrder = 'id';
    protected $defaultOrderPosition = 'asc';
    protected $defaultWhere = [];
    protected $dataForm = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 20;
        $order = $request->all()['order'] ?? null;
        if ($order !== null) {
          $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? $this->defaultOrder;
        $order[1] = $order[1] ?? $this->defaultOrderPosition;
        $where = $request->all()['where'] ?? [];
        $like = $request->all()['like'] ?? null;
        if ($like) {
          $like = explode(',', $like);
          $like[1] = '%' . $like[1] . '%';
        }
        $result = $this->model->orderBy($order[0], $order[1])
          ->where(function($query) use ($like) {
            if ($like) {
              return $query->where($like[0], 'like', $like[1]);
            }
            return $query;
          })
          ->where($where)
          ->with($this->relationships())
          ->paginate($limit);
        //dd($result);
        //exit;
        return view("admin.". $this->localView . ".index", compact('result'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function getItens()
    {
        foreach ($this->listBox as $key => $value) {
            $this->resultView[$key] = $value[0]::pluck($value[2], $value[1]);
        }
    }

    public function create()
    {
        $this->getItens();
        $itens = $this->resultView;
        return view('admin.'. $this->localView .'.create', compact('itens'));
    }    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->dataForm = $request->all();
        $this->beforeSave($request);
        $result = $this->model->create($this->dataForm);
        $this->afterSave($request, $result);
        return redirect()->route('admin'. $this->routerController .'.index');
    }

    public function beforeSave(Request $request)
    {

    }

    public function afterSave(Request $request, $result)
    {
        
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->model->with($this->relationships())
          ->findOrFail($id);        
        return view('admin.'. $this->localView .'.show', compact('result'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->getItens();
        $itens = $this->resultView;
        $result = $this->model->with($this->relationships())
          ->findOrFail($id); 

        $this->afterEdit($result);

        return view('admin.'. $this->localView .'.edit', compact('result', 'itens'));
    }    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->dataForm = $request->all();
        $this->beforeSave($request);
        $result = $this->model->findOrFail($id);
        $result->update($this->dataForm);
        $this->afterSave($request, $result);
        return redirect()->route('admin'. $this->routerController .'.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = $this->model->findOrFail($id);
      if($this->beforeDelete($result)) {
            $result->delete();
            $this->afterDelete($result);
        }
      return redirect()->route('admin'. $this->routerController .'.index');
    }

    public function beforeDelete($result)
    {
        return true;
    }

    public function afterDelete($result)
    {
        
    } 
    
    public function afterEdit(&$result)
    {
        
    }     

    protected function relationships()
    {
      if (isset($this->relationships)) {
        return $this->relationships;
      }
      return [];
    }

    protected function trataCampoDecimal($campo)
    {
        $this->dataForm[$campo] = str_replace(".", "", $this->dataForm[$campo]);
        $this->dataForm[$campo] = str_replace(",", ".", $this->dataForm[$campo]);        
    }

    protected function trataCampoDecimalEdit(&$obj, $campo)
    {
        if(!empty($obj->$campo))
        $obj->$campo = number_format($obj->$campo, 2, ',', '.');
    }    
}
