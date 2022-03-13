<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectRecouces;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Inbox;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeFrontController extends Controller
{
    public function sliders(Request $request)
    {
        $data = Slider::orderBy('id', 'DESC')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function products(Request $request)
    {
        $data = Project::with('Category')->orderBy('id', 'DESC')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function settings(Request $request)
    {
        $data = Setting::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function aboutUs(Request $request)
    {
        $data = AboutUs::where('id', '1')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function services(Request $request)
    {
        $data = Service::get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }

    public function categories(Request $request)
    {
        $data = Category::orderBy('id', 'DESC')->get();
        return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
    }


    public function productDetails(Request $request, $id)
    {
        $data = Project::find($id);
        if ($data) {
            $data = Project::where('id', $id)->with(['Images','Category','Colors','Addons'])->first();
            $data = (new ProjectRecouces($data));
            return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
        } else {
            return msg($request, '401', 'يجب اختيار المنتج صحيح');
        }
    }
    public function productByCategory(Request $request, $id)
    {
        $data = Category::where('id',$id)->whereNotNull('parent_id')->orderBy('id', 'DESC')->get();
        if ($data) {
            $data = Project::where('id', $id)->with(['Images','Category','Colors','Addon'])->first();
            return msgdata($request, success(), 'تم عرض البيانات بنجاح', $data);
        } else {
            return msg($request, '401', 'يجب اختيار القسم صحيح');
        }
    }

    public function inbox(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $data['user_id'] = auth('api')->user()->id;
        Inbox::create($data);
        return msgdata($request, success(), 'تم الارسال بنجاح', $data);


    }
}
