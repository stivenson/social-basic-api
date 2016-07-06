<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use JWTAuth;

/**
 * Class SesionController
 * @package App\Http\Controllers\API
 */

class SesionAPIController extends InfyOmBaseController
{


    public function store(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if(!$token = JWTAuth::attempt($credentials)){
            return Response::json(ResponseUtil::makeError('failure logging'), 404);
        }

        $user = JWTAuth::toUser($token);

        return $this->sendResponse([
                        'user'=>$user,
                        'token' => compact('token')
                        ],'Sesion saved successfully');
    }


    public function destroy()
    {

        $token = JWTAuth::getToken();
        // JWTAuth::removeToken($token);

        if ($token) {
          JWTAuth::setToken($token)->invalidate();
        }

        return $this->sendResponse($id, 'Sesion deleted successfully');
    }
}