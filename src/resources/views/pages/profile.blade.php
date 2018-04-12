@extends('layouts.main')
@section('title', $user->name.' - Profile')
@section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
        <div id="fh5co-board" data-columns>
            <center><h1>{{$user->name}}
            <small>
            @switch($user->level)
							@case(0)
							Banned
							@break
							@case(2)
                            Editor
							@break
							@case(3)
                            Moderator
							@break
							@case(4)
                            Administrator
							@break
							@default
							@break
						@endswitch
            </small>
            </h1>
            <a href="">{{count($posts)}} {{ count($posts) == '1' ? 'post' : 'posts' }}</a> | <a href="">2 comments</a>
            <p class="fh5co-social-icons">
                        @if($social->twitter != null)
						<a href="https://twitter.com/{{$social->twitter}}"><i class="icon-twitter"></i></a>
                        @endif
                        @if($social->facebook !=null)
						<a href="{{$social->facebook}}"><i class="icon-facebook"></i></a>
                        @endif
                        @if($social->youtube !=null)
						<a href="https://youtube.com/c/{{$social->youtube}}"><i class="icon-youtube"></i></a>
                        @endif
                        @if($social->instagram != null)
                        <a href="https://instagram.com/{{$social->instagram}}"><i class="icon-instagram"></i></a>
                        @endif
					</p>
                    <hr>
                @if($social->bio == '')
                <p>No description given.</p>
                @else
                <p>{!!$social->bio!!}</p>
                @endif
                <hr>
                @if($user->name == Auth::user()->name)
                [ <a href="{{url('profile/edit')}}">Edit Profile</a> ]
                @endif
            </center>
            
        </div>
        </div>
       </div>
	</div>
@endsection