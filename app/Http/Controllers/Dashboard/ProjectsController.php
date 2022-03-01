<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\ProjectRequest;
use App\Models\AddOn;
use App\Models\AttributeValues;
use App\Models\Category;
use App\Models\ProductAddon;
use App\Models\ProductAttribute;
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
        $Category = Category::whereNotnull('parent_id')->get();
        $addon = AddOn::all();
        $attr = AttributeValues::where('attribute_id', '1')->get();
        return view('dashboard.' . $this->viewPath . '.create', compact('Category', 'attr', 'addon'));
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
        unset($data['colors']);
        unset($data['addons']);

        $project = $this->model::create($data);
        if ($request->images) {
            foreach ($request->images as $row) {
                $project_images_data['image'] = $row;
                $project_images_data['project_id'] = $project->id;
                ProjectImages::create($project_images_data);
            }
        }

        if ($request->colors) {
            ProductAttribute::create([
                'project_id' => $project->id,
                'attribute_id' => '1',
                'value' => json_encode($request->colors)
            ]);

        }
        if ($request->addons) {
            foreach ($request->addons as $row) {
                ProductAddon::create([
                    'project_id' => $project->id,
                    'addon_id' => $row,
                ]);
            }

        }

        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function edit($id)
    {
        $addon = AddOn::all();
        $attr = AttributeValues::where('attribute_id', '1')->get();
        $Category = Category::whereNotnull('parent_id');
        $data = $this->model::with('Images', 'Colors', 'Addon')->findOrFail($id);
        $addon_ids = ProductAddon::where('project_id', $id)->pluck('addon_id')->toArray();

        return view('dashboard.' . $this->viewPath . '.edit', compact('data', 'Category', 'attr', 'addon', 'addon_ids'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $data = $request->all();
        unset($data['images']);
        unset($data['colors']);

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

        $project = $this->model::where('id', $id)->update($data);

        if ($request->colors) {
            ProductAttribute::where('project_id', $id)->update([
                'value' => json_encode($request->colors)
            ]);
        }
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

    public function changeActive(Request $request)
    {
        $this->model::where('id', $request->id)->update([
            'active' => $request->active
        ]);
    }

    public function changeTryable(Request $request)
    {
        $this->model::where('id', $request->id)->update([
            'tryable' => $request->tryable
        ]);
    }

    public function changeSpecial(Request $request)
    {
        $this->model::where('id', $request->id)->update([
            'special' => $request->special
        ]);
    }

}
