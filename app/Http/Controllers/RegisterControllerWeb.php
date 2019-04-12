<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class RegisterControllerWeb extends Controller
{
  /*
  * Register user vai API
  */
  public function register(Request $request)
       {
               $validator =  Validator::make($request->all(), [
                 'name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                 'password' => ['required', 'string', 'min:8', 'confirmed'],
                 ]);

           if($validator->fails()){
                   return response()->json($validator->errors()->toJson(), 400);
           }
           //$filable = ['name','email','password'];
           $user =  User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' => Hash::make($request['password']),
           ]);

           $token = JWTAuth::fromUser($user);

           return response()->json(compact('user','token'),201);
       }


}
