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
                                <a href="profile/{{$post->user['id']}}">{{$post->user['name']}}</a>
                            </strong>
                                <span class="functions"><a href="posts/{{$post->id}}/edit">Edit</a>
                                |
                                <a href="posts/{{$post->id}}/delete">Delete </span>
                        </small>
                        </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection