<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AddOnDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\AddOnRequest;
use App\Models\AddOn;
use Illuminate\Http\Request;

class AddOnController extends GeneralController
{
    protected $viewPath = 'addon';
    protected $path = 'addon';
    private $route = 'addons';
    private $image_path = 'addons';
    protected $paginate = 30;

    public function __construct(AddOn $model)
    {
        parent::__construct($model);
    }

    public function index(AddOnDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(AddOnRequest $request)
    {
        $data = $request->validated();
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(AddOnRequest $request, $id)
    {
        $data = $request->validated();
        $item = $this->model->find($id);
        unset($data['_token']);
        $this->model::where('id',$id)->update($data);
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');
    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }


}
