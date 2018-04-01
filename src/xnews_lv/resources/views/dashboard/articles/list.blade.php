@extends('dashboard.templates.dashboard')
@section('title', 'Article List')
@section('page_title', 'Article List')
@section('page_description', 'All published and visible articles')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Articles</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Last Updated</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                            @if(count($posts) <= 0)
                            No articles to display.
                            @else  
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>
                                        <td>{{$post->user['name']}}</td>
                                        <td><a href="{{url('dashboard/articles/edit'.$post->id)}}">Edit</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
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