@extends('layouts.main') @section('title', 'Article View') @section('main_content')
<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="fh5co-desc">
                    <h1>{{$post->title}} <small>Posted by <strong><a href="profile/{{$post->user['id']}}">{{$post->user['name']}}</a></strong></small></h1>
                    {{$post->body}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection