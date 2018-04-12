@extends('dashboard.templates.dashboard') @section('title', 'Edit User') @section('page_title', 'Edit User') @section('page_description',
$user->name) @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
        @include('dashboard.dashboard.messages')
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit {{$user->name}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/users/edit/details/'.$user->id)}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-name" placeholder="Username" value="{{$user->name}}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-email" placeholder="example@example.com" value="{{$user->email}}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label>Auth Level</label>
                            <select id="level" name="edit-level" class="form-control">
                                <option class="bg-danger text-white" id="0" value="0" {{ $user->level === 1 ? 'selected' : '' }}>Banned</option>
                                <option id="1" value="1" {{ $user->level === 1 ? 'selected' : '' }}>Normal User</option>
                                <option id="2" value="2" {{ $user->level === 2 ? 'selected' : '' }}>Editor</option>
                                <option id="3" value="3" {{ $user->level === 3 ? 'selected' : '' }}>Moderator</option>
                                <option id="4" value="4" {{ $user->level === 4 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit User</button>
                    </div>
                </form>
            </div>
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Change {{$user->name}}'s Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/users/edit/password/'.$user->id)}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" data-lpignore="true" class="form-control" name="new-password" placeholder="" autocomplete="new-password"
                                required />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Articles by {{$user->name}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body table-responsive no-padding">
                    @if(count($posts)
                    <=0 ) <div class="form-group">
                        <center>No articles found for
                            <strong>{{$user->name}}</strong>
                        </center>
                </div>
                @else
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <a class="btn btn-warning btn-xs" target="_blank" href="{{url('posts/'.$post->id)}}">View</a>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-danger" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
                <h3 class="box-title">Profile Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="nope" action="{{url('dashboard/users/edit/profile/'.$user->id)}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">About Me</label>
                        <textarea name="bio" id="article-ckeditor">{!!$social->bio!!}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Twitter</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="twitter" value="{{$social->twitter}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="instagram" value="{{$social->instagram}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                            <input type="text" name="facebook" value="{{$social->facebook}}" class="form-control" placeholder="Full Profile URL">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">YouTube</label>
                        <div class="input-group">
                            <span class="input-group-addon">youtube.com/</span>
                            <input type="text" name="youtube" value="{{$social->facebook}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Skype</label>
                            <input type="text" name="skype" value="{{$social->facebook}}" class="form-control" placeholder="Username">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save Profile Settings</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection