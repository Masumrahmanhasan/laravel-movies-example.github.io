<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MoviesController extends Controller
{
	public function index()
	{
		$popularMoviesArray 	= Http::get('https://api.themoviedb.org/3/movie/popular?api_key=0868854b77761d1bf8172077e0dc6218')
									->json()['results'];
		
		$genresArray 			= Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=0868854b77761d1bf8172077e0dc6218')
									->json()['genres'];

		$nowPlayingArray 		= Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=0868854b77761d1bf8172077e0dc6218')
									->json()['results'];

		$popularMovies 			= collect($popularMoviesArray);		//by this can take as many data i want
		$nowPlaying 			= collect($nowPlayingArray)->take(10);		//by this can take as many data i want
		$genres 				= collect($genresArray)->mapWithKeys(function($genre){
			return [$genre['id'] => $genre['name']];
		});


		return view('movies.index', [
			'popularMovies' => $popularMovies,
			'genres' 		=> $genres,
			'nowPlaying' 	=> $nowPlaying,
			]);
	}

	public function show($id)
	{
		$movie 					= Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=0868854b77761d1bf8172077e0dc6218'.'&append_to_response=credits,videos,images')
									->json();
		return view('movies.show', [
			'movie' => $movie,
		]);
	}
}
