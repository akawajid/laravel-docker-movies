<?php

use Illuminate\Http\Response;

class BaseController{

    function handleSuccessResponse($data){
        return response()->json($data, Response::HTTP_OK);
    }

    function handleErrorResponse($error, $status = Response::HTTP_BAD_REQUEST){
        return response()->json($error, $status);
    }
}