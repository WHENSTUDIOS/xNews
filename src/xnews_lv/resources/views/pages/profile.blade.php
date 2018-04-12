@extends('layouts.main')
@section('title', $user->name.' - Profile')
@section('main_content')
<div id="fh5co-main">
		<div class="container">

			<div class="row">
        <div id="fh5co-board" data-columns>
            <center><h1>{{$user->name}}</h1>
            <p class="fh5co-social-icons">
						<a href="https://twitter.com/{{$social->twitter}}"><i class="icon-twitter"></i></a>
						<a href="{{$social->facebook}}"><i class="icon-facebook"></i></a>
						<a href="https://youtube.com/c/{{$social->youtube}}"><i class="icon-youtube"></i></a>
                        <a href="https://instagram.com/{{$social->instagram}}"><i class="icon-instagram"></i></a>
					</p>
                @if($social->bio == '')
                <p>No description given.</p>
                @else
                <p>{!!$social->bio!!}</p>
                @endif
            </center>
            
        </div>
        </div>
       </div>
	</div>
@endsection