<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;

class AboutUsController extends GeneralController
{
    protected $viewPath = 'aboutUs';
    protected $path = 'aboutUs';
    private $route = 'admin';
    private $image_path = 'aboutUs';
    protected $paginate = 30;

    public function __construct(AboutUs $model)
    {
        parent::__construct($model);
    }


    public function edit($id)
    {
        $id = '1';
        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(AboutUsRequest $request, $id)
    {
        $data = $request->all();
        $id='1';
        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, null, 300);
            }
        } else {
            unset($data['image']);
        }
        $this->model::where('id', $id)->update($data);;


        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');

    }


}


