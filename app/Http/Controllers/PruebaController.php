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
  
  private function preprocessdata($data, $search=null){
    $words=array_count_values(str_word_count($data, 1));
    $word=array();
    
    if($search==null){
      return $words;
    }else{
      if(!empty($words[$search])){
        $word[$search]=$words[$search];
      }
      return $word;
    }
  }
  
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function app($word=null)
  {
      
      $dataposts=$this->getdata("/posts");
      $datausers=$this->getdata("/users");
      
      //data users
      foreach ($datausers as $value) {
        $id=array_shift($value);        
        $data[$id]['user']=$value;
      }
       
      
      
      foreach ($dataposts as $value) {
        $relevance=0;
        \extract($value);
        //now enable 
        
        $wordsontitle=$this->preprocessdata($title,$word);
        $wordsonbody=$this->preprocessdata($body,$word);
        
        //las palabras en titulo multiplican
        if(!empty($wordsontitle[$word])){
          $relevance=@$wordsontitle[$word]*2;
        }
        //las palabras en body solo suma
        if(!empty($wordsonbody[$word])){
          $relevance+=$wordsonbody[$word];
        }
        
        
        $data[$userId]['posts'][$id]=array("title"=>$title, "body"=>$body, "utitle"=>$wordsontitle , "ubody"=>$this->preprocessdata($body,$word), "relevance"=>$relevance);
      }
      
      return response()->json($data);

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
