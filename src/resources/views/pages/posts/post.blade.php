@extends('layouts.main') @section('title', Config::get('site.data.name') . ' - ' . $post->title) @section('main_content')
<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="fh5co-desc">
                    <h1>{{$post->title}}</h1>
                    {!!$post->body!!}
                    <hr>
                    <h3>
                        <small>
                            Posted by
                            <strong>
                                @csrf
                                <a href="../profile/{{$post->user['id']}}">{{$post->user['name']}} </a>
                            </strong>
                            @if($post->created_at == $post->updated_at) {{$post->created_at->diffForHumans()}} @else | Last modified
                            <i>{{$post->updated_at->diffForHumans()}}</i> by {{$post->updater['name']}}
                            @endif @if(Auth::check() && Auth::user()->level >=2)
                            @if($post->visible == 0)
                            | This post is <strong>hidden</strong>. You can un-hide it from the <a href="{{url('dashboard/articles/edit/'.$post->id)}}">Dashboard</a>.
                            @endif
                            <span class="functions">
                                <a href="../posts/{{$post->id}}/edit">Edit</a>
                                @if(Auth::check() && Auth::user()->level >=3) |
                                <form action="../posts/{{$post->id}}" method="POST" style="display:inline;">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" class="delete-button error" value="Delete" />
                            </span>
                            @endif @endif
                            </form>
                        </small>
                        </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection