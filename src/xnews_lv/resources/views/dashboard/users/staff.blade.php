@extends('dashboard.templates.dashboard')
@section('title', 'Staff List')
@section('page_title', 'Staff List')
@section('page_description', 'All staff members')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    </div>
                @endif
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($users) <= 0)
                            No staff to display.
                            @else  
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Account Created</th>
                                <th>Auth Level</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}} UTC</td>
                                        <td>{{$user->level}}</td>
                                        <form action="{{url('dashboard/users/demote/'.$user->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><a class="btn btn-warning btn-xs" href="{{url('profile/'.$user->id)}}">Profile</a> | <a class="btn btn-success btn-xs" href="{{url('dashboard/users/edit/'.$user->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Demote"/></span></td>
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