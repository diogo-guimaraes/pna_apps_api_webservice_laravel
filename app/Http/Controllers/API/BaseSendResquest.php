<?php

namespace App\Http\Controllers\API;

class BaseSendResquest
{
    /**
     * success response method.
     *
     * success = true
     * data = ao resultado esperado a ser apresentado
     * status_code = 200
     * message = mensagem esperada
     * 
     * @return \Illuminate\Http\Response
     */
    public static function sendSuccess($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'status_code' => 200
        ];
        if(!empty($message)){
           $response['message'] = $message;
        }
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public static function sendError($error, $errorMessages = [], $code)
    {   
        // $error = "oi";
    	$response = [
            
            'success' => false,
            'message' => $error,
            'status_code' => $code
        ];
        if(!empty($error)){
            $response['message'] = $error;
        }
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

}