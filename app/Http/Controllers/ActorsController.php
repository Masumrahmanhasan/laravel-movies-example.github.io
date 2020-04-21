<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
   public function index(){

   	$popularActors 	= Http::get('https://api.themoviedb.org/3/person/popular?api_key=0868854b77761d1bf8172077e0dc6218')
									->json()['results'];
									dump($popularActors);
   	return view('actors.index', ['popularActors' => $popularActors]);
   }

   public function show(){
   		return view('actors.show');
   }
}
