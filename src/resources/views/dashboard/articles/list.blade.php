@extends('dashboard.templates.dashboard')
@section('title', 'Article List')
@section('page_title', 'Article List')
@section('page_description', 'All published and visible articles')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @include('dashboard.dashboard.messages')
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Articles</h3>
                    <a style="cursor:pointer;float:right"  onclick="javascript: window.location = '{{url('dashboard/articles/create')}}';" class="btn btn-success btn-xs"><span class="fa fa-plus"></span> &nbsp; New</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($posts) <= 0)
                            &nbsp; No articles to display.
                            <br>
                            @else  
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Created On</th>
                                <th>Last Updated</th>
                                <th>Views</th>
                                <th>Author</th>
                                <th>Last Editor</th>
                                <th>Actions</th>
                            </tr>
                            <input type="hidden" value="{{$i = 0}}">
                                @foreach($posts as $post)
                                <input type="hidden" value="{{$i++}}">
                                    @if($post->visible == 0)
                                    <tr class="visno" title="This article is not visible on the main index.">
                                    @else
                                    <tr>
                                    @endif
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        @if($post->category == 0)
                                        <td>None</td>
                                        @else
                                        <td>{{$post->categories['name']}}</td>
                                        @endif
                                        <td>{{$post->created_at->diffForHumans()}}</td>
                                        <td><a href="{{url('dashboard/articles/edit/'.$post->id.'/history')}}">{{$post->updated_at->diffForHumans()}}</a></td>
                                        <td>{{$post->views}}</td>
                                        <td>{{$post->user['name']}}</td>
                                        <td>{{$post->updater['name']}}
                                        <form action="{{url('dashboard/articles/delete/'.$post->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-success btn-xs" href="{{url('dashboard/articles/edit/'.$post->id)}}">Edit</a> | <button data-toggle="modal" data-target="#delete{{$i}}" type="button" class="btn btn-danger btn-xs" value="Delete">Delete</button> | <button data-toggle="modal" data-target="#clear{{$i}}" type="button" class="btn btn-primary btn-xs" value="Delete">Clear Comments</button> | <button data-toggle="modal" data-target="#reset{{$i}}" type="button" class="btn btn-warning btn-xs" value="Delete">Reset Views</button></td>
                                        <div class="modal modal-danger fade" id="delete{{$i}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Deletion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to delete <strong>{{$post->title}}</strong>. This cannot be undone. Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-outline">Delete</button>
                                                </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                            <div class="modal modal-warning fade" id="reset{{$i}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Action</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to reset views to 0 for <strong>{{$post->title}}</strong>. This cannot be undone. Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <a style="cursor:pointer"  onclick="javascript: window.location = '{{url('dashboard/articles/clearviews/'.$post->id)}}';" class="btn btn-outline">Reset Views</a>
                                                </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                            <div class="modal modal-warning fade" id="clear{{$i}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Action</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to clear all comments for <strong>{{$post->title}}</strong>. This cannot be undone. Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <a style="cursor:pointer" onclick="javascript: window.location = '{{url('dashboard/articles/clearcomments/'.$post->id)}}';" type="submit" class="btn btn-outline">Clear Comments</a>
                                                </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="table-center">
                {{$posts->links()}}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div>
    </div>
    </div>
    </div>
</section>
@endsection