<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;


class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->except('password_confirmation');

        $user = User::create($data);


        $token = $user->createToken('API Token')->accessToken;
        return $this->userResponse($user,$token);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }
        $token = auth()->user()->createToken('API Token')->accessToken;
        return $this->userResponse(auth()->user(),$token);

    }

    private function userResponse(User $user, $token)
    {
        return response([
             'data' => new AuthResource($user),
            'token' => $token
        ]);
    }
}
