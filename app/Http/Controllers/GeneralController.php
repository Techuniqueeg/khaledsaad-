<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GeneralController extends Controller
{

    public $model;
    protected $view = 'dashboard.';
    protected $url = 'dashboard/';
    protected $frontView = 'front.';
    protected $pathImages = 'uploads/';
    protected $paginate = 20;
    protected $quality = 80;
    protected $encode = 'jpg';

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->paginate = request()->pagination ?? $this->paginate;
    }

    public function viewPath($view)
    {
        return $this->view . $view;
    }

    public function frontView($frontView)
    {
        return $this->frontView . $frontView;
    }

    public function urlPath($url)
    {
        return $this->url . $url;
    }

    public function getData()
    {
        return $this->model->orderBy('id', 'DESC');
    }

    public function withOutHide()
    {
        return $this->model->where('hide', 0);
    }

    public function slug($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace("/[^a-z0-9_\-\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهيیةى]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    public function slugItem($slug)
    {
        return $this->model->where('hide', 0)->where('slug', $slug);
    }

    /*************************************
    End Quires Get Data
     ************************************/


    /*************************************
    Start Uploading Files
     ************************************/
    /**
     * Uploading Image
     * @param $file
     * @param $path
     * @param null $oldFile
     * @param int|null $width
     * @param int|null $height
     * @param int|null $thumbnailWidth
     * @param int|null $thumbnailHeight
     * @param bool $watermark
     * @return |null
     */
    public function uploadImage($file, $path, $oldFile = null, int $width = null, int $height = null, int $thumbnailWidth = null, int $thumbnailHeight = null, bool $watermark = false)
    {
        if($file) {
            // Rename File
            $rename = date('Ymdgis') . mt_rand(100, 1000000) . '.' .$file->getClientOriginalExtension();
            // Path File
            $fullPath = $file->storeAs($this->pathImages . $path, $rename, 'public_images');
            // Generate Image
            $image = Image::make($file);
            // If Watermark Equal True
            if($watermark === true) {
                $this->watermark($image);
            }
            // If Width and Height not Null
            if($width && $height) {
                // Resize image as specific width and height
                $image->resize($width, $height);
            } else if($width || $height) {
                // If need specific width and auto height
                $image->resize($width, $height, function ($aspect) {
                    $aspect->aspectRatio();
                });
            }
            // Save Image in the Full Path
            $image->save(public_path($fullPath, $this->quality ?? $this->quality, $this->encode));
            // Check If Exist thumbnail Image
            if($thumbnailWidth || $thumbnailHeight) {
                $this->thumbnailImage($file, $rename, $path, $thumbnailWidth, $thumbnailHeight, $watermark);
            }
            // Delete Old Files
            if($oldFile) {
                $this->deleteImage($oldFile);
            }
            return $fullPath;
        }
        return $oldFile;
    }

    // Generate Water Mark Inside Main Image
    private function watermark($image = null, $thumbnailImage = null)
    {
        $watermark = public_path($this->pathImages . 'watermarks/logo.png');
        if($image)
            $image->insert($watermark, 'center');
        if($thumbnailImage)
            $thumbnailImage->insert($watermark, 'center');
    }

    // Generate Thumbnail Image
    private function thumbnailImage($file, $rename, $path, $width, $height, $watermark) {
        // Generate Thumbnail Image
        $thumbnailImage = Image::make($file);
        // If Watermark Equal True
        if($watermark === true) {
            $this->watermark(null, $thumbnailImage);
        }
        $fullThumbnailPath = $file->storeAs($this->pathImages . 'thumbnail/' . $path, $rename, 'public_images');
        // If Thumbnail Width and Height not Null
        if($width && $height) {
            // Resize Thumbnail image as specific width and height
            $thumbnailImage->resize($width, $height);
        } else if($width || $height) {
            // If need specific width and auto height
            $thumbnailImage->resize($width, $height, function ($ratio) {
                $ratio->aspectRatio();
            });
        }
        // Save Thumbnail Image in Path Thumbnail
        $thumbnailImage->save($fullThumbnailPath, $this->quality, $this->encode);
    }
    /*************************************
    End Uploading Files
     ************************************/



    /*************************************
    Start Validation
     ************************************/
    /**
     * Validation $id in Model
     * @param $id
     * @return mixed
     */
    public function validateModel($id)
    {
        // Get data Category
        $data = $this->model->findOrFail($id);
        return $data;
    }
    /*************************************
    End Validation
     ************************************/


    /*************************************
    Start Get User Login Guards
     ************************************/

    /**
     * Get Admin Logged
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function admin()
    {
        return auth('admin')->user();
    }

    /**
     * Get Seller Logged
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function seller()
    {
        return auth('seller')->user();
    }

    /**
     * Get Company Logged
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        return auth()->user();
    }

    /**
     * Get User Login APi
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function userApi()
    {
        return auth('api')->user();
    }

    /*************************************
    Start Get User Login Guards
     ************************************/



    /*************************************
    Start General Functions
     ************************************/
    /**
     * Code Generate
     * @return string
     */
    public function code()
    {
        return sha1(uniqid('_m') . md5(date('Ymdhis'))) . md5(uniqid('_m') . sha1(date('Ymdhis')));
    }


    /**
     * Generate Code
     * @return string
     */
    public function codeGenerate()
    {
        return mt_rand(100000, 999999);
    }


    /**
     * Check Key Generated
     * @param $field
     * @return string
     */
    public function keyUser($field)
    {
        do {
            $key = $this->codeGenerate();
            $user = $this->model->where($field, $key)->first();
        } while($user);

        return $key;
    }


    /**
     * Delete Images from folders
     * @param $image
     * @return bool
     */
    public function deleteImage($image)
    {
        if($image) {
            if(is_array($image)) {
                foreach ($image as $img) {
                    if(!is_null($img)) {
                        // Delete Image from images folder
                        File::delete($image);
                        // Delete Thumbnail Image from Thumbnail folder
                        File::delete($this->pathImages . 'thumbnail' . substr($img, strpos($img, '/', 6)));
                    }
                }
            } else {
                // Delete Image from images folder
                File::delete($image);
                // Delete Thumbnail Image from Thumbnail folder
                File::delete($this->pathImages . 'thumbnail' . substr($image, strpos($image, '/', 6)));
            }
        }

        return true;
    }


    /**
     * Show Flash Message
     * @param $name
     * @param $msg
     */
    public function flash($name, $msg)
    {
        Session::flash($name, $msg);
    }

    /**
     * @param $meta
     * @param null $image
     * @param null $title
     * @param string $type
     */
    /*************************************
    End General Functions
     ************************************/



    /*************************************
    Start Responses Data Json
     ************************************/
    /**
     * Get Success Message
     * @param $data
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */

    public function sendResponse($data, $message = null, $statusCode = null)
    {
        // Set array response data
        $response = [
            'status' => true,
            'message' => $message,
        ];
        // Set Data in Response Array
        $response['data'] = $data;
        // return response data
        return response()->json($response, $statusCode ?? 200);
    }


    /**
     * Get Error Response
     * @param $error
     * @param array $errorMessage
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($error, $errorMessage = [], $code = 200)
    {
        // Set array response data
        $response = [
            'status' => false,
            'message' => $error
        ];

        // If not empty errors message => set item data in response array
        if(!empty($errorMessage)) {
            $response['errors'] = $errorMessage;
        }

        // return response data
        return response()->json($response, $code);
    }


    /**
     * Show MSG Error Response
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function InvalidData($statusCode = null)
    {
        return $this->errorResponse(__('lang.invalid_data'), [], $statusCode);
    }


    /**
     * Validation API Request
     * @param $id
     * @return mixed
     */
    public function ValidationAPI($id)
    {
        // Get data Category
        $data = $this->model->find($id);
        // if not exist data Category
        if(!$data)
            return $this->InvalidData();
        return $data;
    }


    /**
     * Get Specific Item By ID
     * @param $id
     * @return mixed
     */
    public function GetApiItem($id)
    {
        return $this->model->findOrFail($id);
    }
    /*************************************
    End Responses Data Json
     ************************************/

}
