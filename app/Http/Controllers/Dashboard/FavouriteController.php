<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    public function all(Request $request)
    {
        $id = auth('api')->user()->id;
        $data=favourite::where('user_id',$id)->with('Product')->get();
        return msgdata($request, success(), 'قائمه المشاريع المفضله',$data);
    }
    public function add(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'project_id' => 'required|exists:projects,id',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $id = auth('api')->user()->id;
        $favourite = favourite::where('user_id', $id)->where('project_id', $request->project_id)->first();
        if ($favourite) {
            return msg($request, failed(), 'تم اضافه المنتج الي المفضله من قبل');
        }else
            favourite::create([
                'project_id' => $request->project_id,
                'user_id' => $id,
            ]);

        return msg($request, success(), 'تم اضافه المنتج الي المفضله');
    }
    public function delete(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'project_id' => 'required|exists:projects,id',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $id = auth('api')->user()->id;

        $favourite = favourite::where('user_id', $id)->where('project_id', $request->project_id)->first();
        if ($favourite) {
            $fav= favourite::findorfail($favourite->id);
            $fav->delete();
            return msg($request, success(), 'تم حذف المنتج من المفضله بنجاح');
        }else

            return msg($request, failed(), 'هذ المنتج غير موجود المفضله');
    }
}
