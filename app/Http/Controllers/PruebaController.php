<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaController extends Controller
{
  /**
   * Show the my laraveltest page form
   *
   * @return \Illuminate\Http\Response
   */
  public function laraveltest()
  {
      
      $data=array();
      return view('laraveltest',$data);
  }

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
