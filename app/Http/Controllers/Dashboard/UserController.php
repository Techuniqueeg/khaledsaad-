<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends GeneralController
{
    protected $viewPath = 'user.';
    protected $path = 'user';
    private $route = 'users';
    protected $paginate = 30;
    private $image_path = 'users';


    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }
    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, );
            }
        }
        $this->model::create($data);
        return redirect()->route($this->route)->with('success','تم الاضافه بنجاح');
    }
    public function show($id)
    {
        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.details', compact('data'));
    }
    public function edit($id)
    {
        $data = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(UserRequest $request,$id)
    {
        $data = $request->validated();
        $item = $this->model->find($id);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, $item->image);
        }
        $item = $this->model->find($id);
        if ($request->password == null)
        {
            unset($data['password']);
        }
        $item->update($data);
        return redirect()->route($this->route)->with('success','تم التعديل بنجاح');
    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }

}
