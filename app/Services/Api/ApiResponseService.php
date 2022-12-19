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

        $headerCode = $headerCodeError ?? 400;
        $content = [
            'status' => false,
            'message' => $message,
            'errorCode' => $errorCode
        ];

        return compact('headerCode', 'content');
    }

    /**
     * @param  string  $message
     * @param  array  $data
     * @param  int  $headerCode
     * @return array
     */
    public function successResponse(string $message, array $data, int $headerCode = 200){

        $content = [
            'status' => true,
            'message' => $message,
            'data' => $data
        ];

        return compact('headerCode', 'content');
    }

}
