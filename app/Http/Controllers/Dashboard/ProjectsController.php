<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;

class ProjectsController extends GeneralController
{
    protected $viewPath = 'project';
    protected $path = 'project';
    private $route = 'projects';
    private $image_path = 'projects';
    protected $paginate = 30;

    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        $Category=Category::all();
        return view('dashboard.' . $this->viewPath . '.create',compact('Category'));
    }
    public function uploadProjectImage(Request $request)
    {
        $file = $request->file('dzfile');
        if ($file) {
            $image = $this->uploadImage($file, $this->image_path, null, 300);
        }
        return response()->json([
            'name' => $image,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, null, 300);
            }
        }
        unset($data['images']);
        $project = $this->model::create($data);
        if ($request->images) {
            foreach ($request->images as $row) {
                $project_images_data['image'] = $row;
                $project_images_data['project_id'] = $project->id;
                ProjectImages::create($project_images_data);
            }
        }
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {
        $Category=Category::all();
        $data = $this->model::with('Images')->findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', compact('data','Category'));
    }

    public function update(ProjectRequest $request, $id)
    {

        $data = $request->all();
        unset($data['images']);

        $item = $this->model->find($id);
        unset($data['_token']);
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, $item->image, 300);
            }
        } else {
            unset($data['image']);
        }
        if ($request->images) {
            foreach ($request->images as $row) {
                $project_images_data['image'] = $row;
                $project_images_data['project_id'] = $id;
                ProjectImages::create($project_images_data);
            }
        } else {
            unset($data['images']);
        }
        $this->model::where('id',$id)->update($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');

    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function deleteProjectImage($id)
    {
        $data = ProjectImages::findOrFail($id);

        if (ProjectImages::where('project_id', $data->project_id)->count() > 1) {
            $data->delete();
            return back()->with('success', 'تم حذف الصوره بنجاج');
        } else {
            return back()->with('danger', 'لا يمكن حذف , لابد من وجود علي الاقل صوره واحده');
        }

    }

}
