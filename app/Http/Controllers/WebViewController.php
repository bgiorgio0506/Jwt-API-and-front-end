<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebViewController extends Controller
{
    public function viewHompage()
    {
      return view('homepage');
    }
    public function viewLogin()
    {
      return view('login');
    }
    public function viewRegister()
    {
      return;
    }
}
