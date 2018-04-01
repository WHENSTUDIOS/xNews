@extends('layouts.main')
@section('title', 'Home')
@section('main_content')
<div id="fh5co-main">
		<div class="container">

			<div class="row">

        <div id="fh5co-board" data-columns>

			@if(count($posts) >= 1)
			@foreach($posts as $post)
			<div class="item">
        		<div class="fh5co-desc">
				<h1><a href="article/1">{{ $post->title }}</a></h1>
					<strong>By</strong> <a href="profile/{{$post->user['id']}}">{{ $post->user['name'] }}</a> <strong>at</strong> {{ $post->created_at }}
				</div>
        	</div>
			@endforeach
			@else
			<div class="col-md-8 col-md-offset-2">
				<center><h1 class="error">There are no articles!</h1>
				<div class="fh5co-spacer fh5co-spacer-sm"></div>
				<form action="#">
					<div class="row">
						<div class="col-md-12">
							<h3>Go read a book instead... Nothing to see here.</h3>
						</div>
					</div></center>
				</form>
			</div>
			@endif
        </div>
        </div>
       </div>
	</div>
@endsection