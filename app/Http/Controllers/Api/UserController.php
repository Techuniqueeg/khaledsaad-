<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use function auth;
use function msgdata;
use function response;

class UserController extends Controller
{

    public function test(Request $request)
    {
        return 'hello';

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address'=>'required',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password
        ]);

        $code=rand(100000, 999999);

        Verify::create([
           'code'=> $code ,
            'user_id'=> $user->id
        ]);
        $details=[
            'title'=>'khalid saad',
            'body'=>'thank you for register , your code is : ' . $code ,
        ];
        Mail::to($user->email)->send(new TestMail($details));


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return msgdata($request, failed(), $validator->messages()->first(), (object)[]);
        }
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return msgdata($request, failed(), ' بيانات الدخول غير صحيحه', (object)[]);
        }
        $user = Auth::guard('api')->user();

        if (!$token) {
            return $this->returnError('e001', ' بيانات الدخول غير صحيحه');
        }
        $user_data = User::where('id', $user->id)->first();
        $user_data->token_api = $token;

        return msgdata($request, success(), 'تم تسجيل الدخول', $user_data);
    }


    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function verification (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|digits:6|exists:verifies,code',
            'email' => 'required|email|max:191|exists:users,email',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = Auth::guard('api')->user()->id;
        User::where('id',$user)->update(['email_verified'=>'1']);
        Verify::where('user_id',$user)->delete();
        return msg($request, success(), 'تم التفعيل بنجاح');
    }

}
