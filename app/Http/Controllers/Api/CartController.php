<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\AddOn;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends GeneralController
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    public function cart(Request $request, $type)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:projects,id',
            'color_id' => 'required|exists:attribute_values,id|required_with:image',
            'addon_id' => 'nullable|exists:add_ons,id|required_with:image',
            'image' => [
                'nullable',
                'required_with:addon_id',
                'mimes:jpeg,jpg,png'],
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'),'carts');
            }
        } else {
            unset($data['image']);
        }

        $id = auth('api')->user()->id;
        $product = Cart::where('product_id', $data['product_id'])->first();
        if ($product && $type == 'add') {
            $product->update(['quantity' => $product->quantity + 1]);
            return msg($request, success(), 'تم زياده المنتج');
        } elseif ($product && $type == 'add') {
            $product->update(['quantity' => $product->quantity + 1]);
            return msg($request, success(), 'تم زياده المنتج');
        } elseif ($product == null && $type == 'add') {
            $data['user_id'] = $id;
            $cart = Cart::create($data);
            return msg($request, success(), 'تم اضافه المنتج الي السله');
        } elseif ($product == null && $type == 'remove') {

            return msg($request, failed(), 'هذا النتاج غير موجود');
        } elseif ($product->quantity > 1 && $type == 'remove') {
            $product->update(['quantity' => $product->quantity - 1]);
            return msg($request, success(), 'تم نقصان المنتج');
        } elseif ($product->quantity == 1 && $type == 'remove') {
            $product->delete();
            return msg($request, success(), 'تم حذف المنتج من السله');
        }

    }

    public function myCart(Request $request)
    {
        $id = auth('api')->user()->id;
        $data['cart'] = Cart::where('user_id', $id)->with('Product')->get();

        $total = 0;
        foreach ($data['cart'] as $row) {
            if ($row->addon_id){
                $addonPrice= AddOn::where('id', $row->addon_id)->first()->price;
                $total = $total + ($row->quantity *  $row->product->price )+  ($row->quantity * $addonPrice );

            }else{
                $total = $total + $row->quantity * $row->product->price;
            }

        }
        $data['total'] = $total;
        return msgdata($request, success(), 'منتجات السله', $data);
    }

    public function checkout(Request $request)
    {
        $id = auth('api')->user()->id;
        $cart = Cart::where('user_id', $id)->with('Product')->get();
        $total = 0;
        foreach ($cart as $row) {
            $total = $total + $row->quantity * $row->product->price;
        }
        $data['sub_total'] = $total;
        $data['delivery'] = 50;
        $data['tax'] = intval(.14 * $data['sub_total']);
        $data['total'] = $data['sub_total'] + $data['delivery'] + $data['tax'];
        return msgdata($request, success(), 'تم اظهار البيانات', $data);
    }

    public function updateQuantity(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:projects,id|exists:carts,product_id',
            'quantity' => 'required|numeric|gt:-1',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $cart = Cart::where('product_id', $request->product_id)->first();
        if ($request->quantity == '0') {
            $cart->delete();
            return msg($request, success(), 'تم حذف المنتج');
        }
        if ($cart) {
            $cart->update(['quantity' => $request->quantity]);
            return msg($request, success(), 'تم تعديل كميه المنتج');
        }
    }

    public function count(Request $request)
    {
        $id = auth('api')->user()->id;
        $data = Cart::where('user_id', $id)->count();
        return msgdata($request, success(), 'عدد منتجات السله', $data);
    }

    public function remove(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'cart_id' => 'required|exists:carts,id',
        ]);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $data = Cart::findorfail($request->cart_id);
        $data->delete();
        return msg($request, success(), 'تم حذف المنتج من السله بنجاح');
    }
}
