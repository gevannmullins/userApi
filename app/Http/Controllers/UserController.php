<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use App\Http\Requests;


class UserController extends Auth\RegisterController
{

    public function registerUser(Request $request){
        $errors = $this->validator($request->all())->errors();

        if(count($errors))
        {
            return response(['errors' => $errors], 401);
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return response(['user' => $user]);
    }

    public function getAllUsers(){
        return new UserResource(User::all());
    }

    public function getUserById($id){
        return new UserResource(User::find($id));
    }

    public function getUserByToken($remember_token){
        return new UserResource(User::find($remember_token));
    }

    public function loginUser(Request $request){

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            $user = auth()->user();
            $user->remember_token = str_random(60);
            $user->save();
            return [
                'token' => $user->remember_token
                ];
        }

        return response()->json([
            'error' => 'Unauthenticated user',
            'code' => 401,
        ], 401);

    }



}
