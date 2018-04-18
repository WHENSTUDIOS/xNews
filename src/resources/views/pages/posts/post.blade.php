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
                                <a href="../profile/{{$post->user['id']}}">{{$post->user['name']}}</a>
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
                    <h4>Comments</h4>
                    <br>
                    <p><a>whenofficial</a> | 2 weeks ago</p>
                    <p>Great article!</p>
                    <hr>
                    <p><a>whenofficial</a> | 2 weeks ago</p>
                    <p>Great article!</p>
                    <hr>
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection