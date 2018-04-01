@extends('layouts.main') @section('title', 'Article View') @section('main_content')
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
                                <form action="../posts/{{$post->id}}" method="POST">
                                @csrf
                                <a href="../profile/{{$post->user['id']}}">{{$post->user['name']}} </a></strong>
                                | Last modified at <strong>{{$post->updated_at}}</strong>
                                @if(Auth::check())
                                <span class="functions"><a href="../posts/{{$post->id}}/edit">Edit</a>
                                |
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit" class="delete-button error" value="Delete"/></span>
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