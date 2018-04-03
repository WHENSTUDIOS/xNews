@extends('dashboard.templates.dashboard') @section('title', 'wCMS') @section('page_title', 'wCMS') @section('page_description',
'Edit the main data on the website') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    </div>
                @elseif(isset($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                            {{$error}}
                    </div>
                    @endforeach
                @endif
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit {{ Config::get('site.data.name') }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/users/edit/details/'.$user->id)}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Name</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-name" placeholder="Site Name" value="{{ Config::get('site.data.name') }}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">URL</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-email" placeholder="Full URL" value="{{ Config::get('site.data.url') }}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select id="level" name="edit-level" class="form-control">
                                <option id="1" value="en-us" {{ Config::get('site.data.language') === 'en-us' ? 'selected' : '' }}>en-US</option>
                                <option id="2" value="fr" {{ Config::get('site.data.language') === 'fr' ? 'selected' : '' }}>FR</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
                            <td>{{$post->created_at}}</td>
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
                        <label for="exampleInputPassword1">Google+</label>
                            <input type="text" name="googleplus" value="{{$social->googleplus}}" class="form-control" placeholder="Full G+ Profile URL">
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