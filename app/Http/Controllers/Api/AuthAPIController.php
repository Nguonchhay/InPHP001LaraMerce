<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthAPIController extends ApiController
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $queryUser = User::where('email', $email)->first();

        // Check if email is correct
        if (empty($queryUser)) {
            return $this->sendError('Invalid credentials');
        }

        // Check if password is match
        if (!Hash::check($password, $queryUser->password)) {
            return $this->sendError('Invalid credentials');
        }

        $token = $queryUser->createToken('Full Access Token');
        $res = [
            'token' => $token->plainTextToken
        ];

        return $this->sendSuccess(
            $res,
            'Login success'
        );
    }
}
