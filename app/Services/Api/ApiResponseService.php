<?php
/**
 * Company: Buzzvel (https://buzzvel.com)
 * User: Mauro Gama
 * Date: 6/15/21
 * Time: 3:41 PM
 */

namespace App\Services\Api;


class ApiResponseService
{

    /**
     * @param  string  $message
     * @param  null  $headerCodeError - status code that will be return to front-end
     * @param  null  $errorCode - a hotspotty unique code
     * @return array
     */
    public function errorResponse(string $message,  $headerCodeError = null, $errorCode = null){

        return [
            'headerCode' => $headerCodeError ?? 400,
            'status' => false,
            'message' => $message,
            'errorCode' => $errorCode
        ];
    }

    /**
     * @param  string  $message
     * @param  array  $data
     * @param  int  $headerCode
     * @return array
     */
    public function successResponse(string $message, array $data, int $headerCode = 200){

        return [
            'headerCode' => $headerCode,
            'status' => true,
            'message' => ($message),
            'data' => $data
        ];
    }

}
