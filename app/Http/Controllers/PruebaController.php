<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaController extends Controller
{
  /**
   * Show the my users page.
   *
   * @return \Illuminate\Http\Response
   */
  public function welcome()
  {
      return view('welcome');
  }
}
