<?php


namespace App\Http\Controllers;


trait ResponseJson
{

    /**
     * Get Success Message
     * @param $data
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */

    function sendResponse($data, $message = null)
    {
        // Set array response data
        $response = [
            'status' => true,
            'message' => $message,
        ];
        // Set Data in Response Array
        $response['data'] = $data;
        // return response data
        return response()->json($response, 200)->getStatusCode();
    }


    /**
     * Get Error Response
     * @param $error
     * @param array $errorMessage
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function errorResponse($error, $errorMessage = [], $code = 404)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function InvalidData()
    {
        return $this->errorResponse(__('lang.invalid_data'));
    }

}