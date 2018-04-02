@extends('dashboard.templates.dashboard') @section('title', 'Create User') @section('page_title', 'Create User') @section('page_description',
'Create a user account') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Custom User Registration</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{url('dashboard/users/list')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Username" autocomplete="off" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="example@example.com" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="email" placeholder="" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Auth Level</label>
                            <select id="level" name="level" class="form-control">
                                <option name="1">Normal User</option>
                                <option name="2">Editor</option>
                                <option name="3">Moderator</option>
                                <option name="4">Admin</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> I agree that I have permission to register a new user using the email provided.
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection