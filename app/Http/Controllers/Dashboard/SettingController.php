<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends GeneralController
{

    protected $viewPath = 'setting.';
    protected $path = 'setting';
    protected $quality = 100;
    protected $encode = 'png';


    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }


    /**
     * Get All Data Model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->model->get();
        return view($this->viewPath($this->viewPath . 'edit'), compact('data'));
    }


    public function update(SettingRequest $request)
    {
        $data = $this->model->get();
        $inputs = $request->validated();
        if ($request->hasFile('logo')) {
            $inputs['logo'] = $this->uploadImage($request->file('logo'), $this->path, $data->where('key', 'logo')->first()->val);
        }
        $this->model->setMany($inputs);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');

    }
}
