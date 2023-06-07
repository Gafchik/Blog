<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseControllers\BaseController;
use App\Http\Requests\ApiAuth\LoginRequest;
use App\Http\Requests\ApiAuth\RegRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function register(RegRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->makeGoodResponse($success);
    }


    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->makeGoodResponse($success);
        }
        else{
            return $this->makeBadResponse(new \Exception('Unauthorised'));
        }
    }
}

