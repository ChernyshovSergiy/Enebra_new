<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
           'referral_number' => 'nullable|string|max:255',
           'first_name'      => 'required|string|max:255',
           'last_name'       => 'required|string|max:255',
           'email'           => 'required|string|email|max:255|unique:users',
           'password'        => 'required|string|between:6,25|confirmed',
           'checkboxG1'      => 'required|string|min:2|max:2'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
           'email'           => 'required|string|email',
           'password'        => 'required|string|between:6,25'
        ]);

        $user = User::whereEmail($request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $user->api_token = str_random(60);
            $user->save();

            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'api_token' => $user->api_token,
                'name' => $user->name,
            ]);
        }

        return response()->json([
            'errors'=>[
                'email' => 'These credentials do not match records'
            ], 422
        ]);
    }
    public function logout(Request $request){
        $user = $request->user;
        $user->api_token = null;
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }
}
