@extends('layouts.main') @section('title', Config::get('site.data.name') . ' - ' . $post->title) @section('main_content')
<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="fh5co-desc">
                    <h1>{{$post->title}}
                        <small>{{$post->categories['name']}}</small>
                    </h1>
                    {!!$post->body!!}
                    <hr>
                    <h3>
                        <small>
                            Posted by
                            <strong>
                                @csrf
                                <a href="../profile/{{$post->user['name']}}">{{$post->user['name']}}</a>
                            </strong> |
                            <strong>{{$post->views}}</strong> view{{ $post->views == 1 ? '' : 's' }}
                            </strong>
                            @if($post->created_at == $post->updated_at) {{$post->created_at->diffForHumans()}} @else | Last modified
                            <i>{{$post->updated_at->diffForHumans()}}</i>
                            @endif @if(Auth::check() && Auth::user()->level >=2) @if($post->visible == 0) | This post is
                            <strong>hidden</strong>. You can un-hide it from the
                            <a href="{{url('dashboard/articles/edit/'.$post->id)}}">Dashboard</a>. @endif
                            @endif
                            </form>
                        </small>
                        </h2>
                        <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Comments ({{count($comments)}})</h4>
                    <br>
                    @if(count($comments) == 0)
                    No comments to display. How about you start the discussion?
                    <br>
                    <br>
                    @else
                    @foreach($comments as $comment)
                    @if(Auth::check() && $comment->user['id'] == Auth::user()->id || Auth::user()->level >= 3)
                    <form name="delete" style="display:inline !important;" method="POST" action="{{url('posts/'.$post->id.'/comment/'.$comment->id.'/delete')}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <p><a href="{{url('profile/'.$comment->user['name'])}}">{{$comment->user['name']}}</a>&nbsp;{!! $comment->user['id'] == $post->user['id'] ? '<span title="OP (Original Poster)" class="fa error fa-pencil"></span>' : '' !!} | {{$comment->created_at->diffForHumans()}} | <a style="display:inline;cursor:pointer" onclick="document.forms['delete'].submit();">Delete</a>
                    </form>
                    @else
                    <p><a href="{{url('profile/'.$comment->user['name'])}}">{{$comment->user['name']}}</a> | {{$comment->created_at->diffForHumans()}}</p>
                    @endif
                    </p>
                    <p>{!! $comment->comment !!}</p>
                    <hr>
                    @endforeach
                    @endif
                
                    @if(!Auth::check())
                    <h4>Please <a href="{{url('login')}}">log in</a> to post a comment.</h4>
                    @else
                    <h5>Write Comment</h5>
                    @if ($errors->any())
                    <small class="error">
                    <strong>Error</strong>: 
                            @foreach ($errors->all() as $error)
                                {{$error}}&nbsp;
                            @endforeach
                    </small>
                    <br>
                    <br>
                    @endif
                    <form method="POST" action="{{url('posts/'.$post->id.'/comment')}}">
                    @csrf
                    <textarea style="resize:none;" name="comment" min="3" max="250" class="form-control"></textarea>
                    <br>
                    <input type="submit" value="Comment" class="btn btn-sm btn-primary">
                    </form>
                    @endif

                </div>
                <div class="col-md-6">
                    <h4>Other Posts</h4>
                    <br>
                    @if(count($recent) == 0)
                    No posts to display.
                    <br>
                    <br>
                    @else
                    @foreach($recent as $rpost)
                    <p>{!! $rpost->id == $post->id ? '<i>' : '' !!}<a href="{{url('posts/'.$rpost->id)}}">{{$rpost->title}}</a> | {{$rpost->created_at->diffForHumans()}} by {{$rpost->user['name']}}{!! $rpost->id == $post->id ? ' (Viewing)</i>' : '' !!}</p>
                    </p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection