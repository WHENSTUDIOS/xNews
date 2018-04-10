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
                                <form action="../posts/{{$post->id}}" method="POST">
                                <small>
                            Posted by
                            <strong>
                                @csrf
                                <a href="../profile/{{$post->user['id']}}">{{$post->user['name']}} </a></strong>
                                | Last modified <i>{{$post->updated_at->diffForHumans()}}</i>
                                @if(Auth::check() && Auth::user()->level >=2)
                                <span class="functions"><a href="../posts/{{$post->id}}/edit">Edit</a>
                                @if(Auth::check() && Auth::user()->level >=3)
                                |
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit" class="delete-button error" value="Delete"/></span>
                                @endif
                                @endif
                                </form>
                        </small>
                        </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection