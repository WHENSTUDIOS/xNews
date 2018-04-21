@extends('dashboard.templates.dashboard')
@section('title', 'User List')
@section('page_title', 'User List')
@section('page_description', 'All users (including banned)')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @include('dashboard.dashboard.messages')
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Account Created</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            @if(count($users) <= 0)
                            No articles to display.
                            @else  
                            <input type="hidden" value="{{$i = 0}}">
                                @foreach($users as $user)
                                <input type="hidden" value="{{$i++}}">
                                    <tr id="l{{$i}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                        @switch($user->level)
                                        @case(0)
                                        Banned
                                        @break
                                        @case(2)
                                        Editor
                                        @break
                                        @case(3)
                                        Moderator
                                        @break
                                        @case(4)
                                        Admin
                                        @break
                                        @default
                                        User
                                        @break
                                        @endswitch
                                        </td>
                                        <form action="{{url('dashboard/users/delete/'.$user->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-warning btn-xs" target="_blank" href="{{url('profile/'.$user->name)}}">Profile</a> | <a class="btn btn-success btn-xs" href="{{url('dashboard/users/edit/'.$user->id)}}">Edit</a> | <button data-toggle="modal" data-target="#delete{{$i}}" type="button" class="btn btn-danger btn-xs" value="Delete">Delete</button></td>
                                        <div class="modal modal-danger fade" id="delete{{$i}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Deletion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to delete <strong>{{$user->name}}</strong>. This cannot be undone! Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" onclick="deleteUser('{{$user->id}}', '{{$i}}')" class="btn btn-outline" data-token="{{csrf_token()}}">Delete</button>
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
                {{$users->links()}}
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