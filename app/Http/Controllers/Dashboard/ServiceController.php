<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController  extends GeneralController
{
    protected $viewPath = 'service';
    protected $path = 'service';
    private $route = 'services';
    private $image_path = 'sliders';
    protected $paginate = 30;

    public function __construct(Service $model)
    {
        parent::__construct($model);
    }

    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->model::where('id',$id)->update($data);;
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');
    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    }


