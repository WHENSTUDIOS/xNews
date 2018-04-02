@extends('dashboard.templates.dashboard')
@section('title', 'Search Results')
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
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Account Created</th>
                                <th>Auth Level</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($result as $res)
                                    <tr>
                                        <td>{{$res->id}}</td>
                                        <td>{{$res->name}}</td>
                                        <td>{{$res->email}}</td>
                                        <td>{{$res->created_at}} UTC</td>
                                        <td>{{$res->level}}</td>
                                        <form action="{{url('dashboard/users/delete/'.$res->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-warning btn-xs" href="{{url('profile/'.$res->id)}}">Profile</a> | <a class="btn btn-success btn-xs" href="{{url('dashboard/users/edit/'.$res->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
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