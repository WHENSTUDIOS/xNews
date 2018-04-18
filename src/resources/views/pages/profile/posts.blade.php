@extends('layouts.main')
@section('title', $user->name.' - Posts')
@section('main_content')
<div id="fh5co-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>
                        <center>Posts by {{$user->name}}</center>
                    </h2>
                    <div class="fh5co-spacer fh5co-spacer-sm"></div>
                        <div class="row">
                            @if(count($posts) == 0)
                            <center>No posts to display.</center>
                            @else
                            <div class="col-xl-4">
                                <br>
                                <div class="col-xl-4">
                                    <table style="width:50%;margin: 0px auto;">
                                        <tr>
                                            <th>Title</th>
                                            <th>Created</th>
                                        </tr>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td><a href="{{url('posts/'.$post->id)}}">{{$post->title}}</a></td>
                                            <td>{{$post->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>
                            </div>
                            @endif
                    </div>
                    <hr>
                    <center>
                        <a href="{{url('profile/'.$user->name)}}" class="btn btn-sm btn-primary">Back to Profile</a>
                    </center>

                </div>
            </div>
        </div>@endsection