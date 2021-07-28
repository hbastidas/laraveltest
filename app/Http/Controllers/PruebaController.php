<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->apiurl="https://jsonplaceholder.typicode.com";
  }
  
  /*
  make get to api
  */
  private function getdata($endpoint, $id=null){
    $response = Http::get($this->apiurl.$endpoint);
    $datajson=$response->json();
    return $response->json();
  }
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
