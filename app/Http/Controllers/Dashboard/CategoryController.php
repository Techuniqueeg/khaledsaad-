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

    public function create($type)
    {
        $category = Category::whereNull('parent_id')->get();
        return view('dashboard.' . $this->viewPath . '.create', compact('category', 'type'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, null, 300);
            }
        } else {
            unset($data['image']);
        }
        $trip = $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {
        $category = Category::whereNull('parent_id')->get();
        $data = $this->model::findOrFail($id);
        if ($data->parent_id == null) {
            $type = 'parent';
        } else
            $type =  'child';

        return view('dashboard.' . $this->viewPath . '.edit', compact('data', 'type', 'category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $item = $this->model->find($id);
        $data = $request->all();
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, $item->image, 300);
            }
        } else {
            unset($data['image']);
        }
        unset($data['_token']);
        $this->model::where('id', $id)->update($data);;
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }

    public function delete(Request $request, $id)
    {
        try {
            $data = $this->model::findOrFail($id);
            $data->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'لا يمكنك الحذف لوجود منتجات بداخل القسم المختارة');
        }
    }

}
