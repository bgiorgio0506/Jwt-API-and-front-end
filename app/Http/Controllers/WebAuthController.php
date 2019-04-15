<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WebAuthController extends Controller
{
  public function JWTLogin(Request $request)
  {
  // Making  client side request to the login endpoint
  $email = input::get('email');
  $psw = input::get('password');
  $curl = curl_init();
  $curl_data = ['email'=> $email, 'password'=> $psw];
  $curl_data = json_encode($curl_data);
  curl_setopt_array($curl, array(
  CURLOPT_URL => "http://jwtall.test/api/auth/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $curl_data,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Accept: application/json"
    ),
  ));
  $response = curl_exec($curl);
          $err = curl_error($curl);

   curl_close($curl);
  }
  public function register()
  {
    //Create client side request to API route 'api/auth/register for registretion'
    $name = input::get('name');
    $email = input::get('email');
    $pass = input::get('password');
    $passconfirm = input::get('password-confirm');
    $curl = curl_init();
    $curl_data = ['name'=>$name,'email'=> $email, 'password'=>$pass, 'password_confirmation'=>$passconfirm];
    $curl_data = json_encode($curl_data);
   curl_setopt_array($curl, array(
    CURLOPT_URL => "http://jwtall.test/api/auth/register",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $curl_data,
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Accept: application/json"
      ),
    ));
    $response = curl_exec($curl);
            $err = curl_error($curl);

  curl_close($curl);
  }
}
