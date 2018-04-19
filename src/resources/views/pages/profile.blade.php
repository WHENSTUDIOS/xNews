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
            <p><a href="{{url('profile/'.$user->name.'/posts')}}">{{count($posts)}} {{ count($posts) == '1' ? 'post' : 'posts' }}</a> | <a href="{{url('profile/'.$user->name.'/comments')}}">{{count($comments)}} {{ count($comments) == '1' ? 'comment' : 'comments' }}</a></p>
            <p class="fh5co-social-icons">
                        @if($social->twitter != null)
						<a href="https://twitter.com/{{$social->twitter}}" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        @endif
                        @if($social->facebook !=null)
						<a href="{{$social->facebook}}" title="Facebook" target="_blank"><i class="icon-facebook"></i></a>
                        @endif
                        @if($social->youtube !=null)
						<a href="https://youtube.com/c/{{$social->youtube}}" title="YouTube" target="_blank"><i class="icon-youtube"></i></a>
                        @endif
                        @if($social->instagram != null)
                        <a href="https://instagram.com/{{$social->instagram}}" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        @endif
					</p>
                    <hr>
                @if($social->bio == '')
                <p>No description given.</p>
                @else
                <p>{!!$social->bio!!}</p>
                @endif
                <hr>
                @if(Auth::check() && $user->name == Auth::user()->name)
                [ <a href="{{url('profile/edit')}}">Edit Profile</a> ]
                @endif
            </center>
            
        </div>
        </div>
       </div>
	</div>
@endsection