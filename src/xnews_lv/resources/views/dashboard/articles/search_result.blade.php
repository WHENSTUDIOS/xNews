@extends('dashboard.templates.dashboard')
@section('title', $q.' - Post Search')
@section('page_title', 'Search Results')
@section('page_description', 'Did we find something?')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">We found {{count($result)}} result{{ count($result) === 1 ? '' : 's' }} for <strong>{{$q}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($result) <= 0)

                            @else  
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Last Updated</th>
                                <th>Author</th>
                                <th>Last Editor (ID)</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($result as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}} UTC</td>
                                        <td>{{$post->updated_at}} UTC</td>
                                        <td>{{$post->user['name']}}</td>
                                        <td>{{$post->update_id}}
                                        <td><a href="{{url('posts/'.$post->id)}}" target="_blank">View on Website</a></td>
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