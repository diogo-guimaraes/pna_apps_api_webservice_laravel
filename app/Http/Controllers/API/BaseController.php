<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseSendResquest;

class BaseController extends Controller
{   
    public $successStatus = 200;
    public $errorUnauthorised = 401;
    public $errorInternalServer = 500;
    public $errorUnprocessableEntity = 422;  
    
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
    public function sendSuccess($result, $message)
    {   
        
    	return BaseSendResquest::sendSuccess($result, $message);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code)
    {      
        return BaseSendResquest::sendError($error, $errorMessages = [], $code);
    }
}
