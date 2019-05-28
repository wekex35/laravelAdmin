<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
class SaveAnswerController extends Controller
{
   public function insertform() {
      return view('admin');
   }

   public function insert(Request $request) {
   		
   		$questions = $request->input('question');
   		echo $url = substr(str_slug($questions),0,50);
   		$short_discription = $request->input('short_discription');
   		$keywords = $request->input('keywords');
   		$summary = $request->input('summary');
   		$answers = $request->input('answer');
   		$summary_url = 'summary/'.$url.'txt';
   		$answers_url = 'answers/'.$url.'txt';


  

   		$query[] = [
           "questions" =>  $questions, 
           "answers" => $answers_url, 
           "summary" => $summary_url,
           "short_discription" => $short_discription,
           "keywords" => $keywords,
           "url" => $url
   		];
       Storage::put('answers/'.$url.'.txt',  $answers);
       Storage::put('summary/'.$url.'.txt', $summary);
     
      DB::table('answers')->insert($query);
   }
}
