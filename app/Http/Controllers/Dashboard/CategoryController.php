<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends GeneralController
{
    protected $viewPath = 'category';
    protected $path = 'category';
    private $route = 'categories';
    private $image_path = 'sliders';
    protected $paginate = 30;

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {

        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->model::where('id', $id)->update($data);;
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
