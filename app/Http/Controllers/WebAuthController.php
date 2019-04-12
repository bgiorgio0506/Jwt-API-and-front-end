<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WebAuthController extends Controller
{
  public function JWTLogin(Request $request)
  {
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
   $result=json_decode($response,true);
   if ($result['access_token'] != null) {
     echo 'Not Logged in error:'.$result['message'];
     //return session('status',403)->middleware('WebAuthenticate'):
   }else{
     echo 'Logged... token is: '.$result['access_token'].'';
     //return session('status',200)->middleware('WebAuthenticate');
   }
  }
  public function register()
  {
    $curl = curl_init();
    $curl_data = ['name'=>'GiorgioB','email'=>'giorgio00@gmail.com', 'password'=>'secret01', 'password_confirmation'=>'secret01'];
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
     $result=json_decode($response,true);
    var_dump($result);
  }
}
