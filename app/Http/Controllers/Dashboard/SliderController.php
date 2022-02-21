<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends GeneralController
{
    protected $viewPath = 'slider';
    protected $path = 'slider';
    private $route = 'sliders';
    private $image_path = 'sliders';
    protected $paginate = 30;

    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(SliderRequest $request)
    {
        $data = $request->all();

        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path);
            }
        }
        $trip = $this->model::create($data);

        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {

        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(SliderRequest $request, $id)
    {
        $data = $request->all();
        $item = $this->model->find($id);

        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path,$item->image);
            }
        } else {
            unset($data['image']);
        }
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
