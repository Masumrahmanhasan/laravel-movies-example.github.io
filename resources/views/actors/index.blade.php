@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16">
	<div class="popular-actors">
		<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>

		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
			@foreach($popularActors as $actor)
			<div class="actors mt-8">
				<a href="">
					<img src="{{ 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
				</a>

				<div class="mt-2">
					<a href="" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
					<div class="text-sm truncate text-gray-400">
					
					</div>
				</div>
			</div>
			
			@endforeach

		</div>

	</div>
</div>

@endsection