<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class retriveQuestionAnswer extends Controller {


 public function questions()
    {
        $questions = DB::table('answers')->select('url','questions')->get();
        return view('home', ['questions' => $questions]);
    }

 public function answer($url)
    {
        $questions = DB::table('answers')->where('url', '=',$url)->distinct()->get();
        return view('answer', ['questions' => $questions]);
    }

}
