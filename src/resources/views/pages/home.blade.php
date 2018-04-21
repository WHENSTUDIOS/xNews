@extends('layouts.main') @section('title', 'Home') @section('main_content')
<div id="fh5co-main">
	<div class="container">

		<div class="row">
			<div id="fh5co-board" class="col-md-12">
				@if(count($notices) >= 1) @foreach($notices as $notice)
				<div class="alert alert-danger">
					<strong>
						<p>{{$notice->name}}</p>
					</strong>
					{!!$notice->content!!}
				</div>
				@endforeach @endif @if(count($posts) >= 1) @foreach($posts as $post)
				<div class="item">
					<div class="fh5co-desc">
						<h1>
							<a href="posts/{{$post->id}}">{{ $post->title }}</a>
						</h1>
						<strong>By</strong>
						<a href="profile/{{$post->user['name']}}">{{ $post->user['name'] }}</a> {{ $post->created_at->diffForHumans() }} | {{$post->views}} view{{ $post->views == 1 ? '' : 's' }}
					</div>
				</div>
				@endforeach @else
				<div class="col-md-8 col-md-offset-2">
					<center>
						<h1 class="error">There are no articles!</h1>
						<div class="fh5co-spacer fh5co-spacer-sm"></div>
						<form action="#">
							<div class="row">
								<div class="col-md-12">
									<h3>Go read a book instead... Nothing to see here.</h3>
								</div>
							</div>
					</center>
					</form>
				</div>
				@endif
			</div>
		</div>
		<div style="text-align:center;">
		{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection