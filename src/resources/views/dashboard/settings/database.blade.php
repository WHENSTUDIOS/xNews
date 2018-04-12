@extends('dashboard.templates.dashboard') @section('title', 'Database Info') @section('page_title', 'Edit Database Info') @section('page_description',
'MySQL database information') @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @include('dashboard.dashboard.messages')
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="POST" action="{{url('/dashboard/settings/database')}}">
                        @csrf
                        <div class="form-group">
                            <label>Database Host</label>
                            <input type="text" id="title" name="db-host" value="{{Config::get('database.connections.mysql.host')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Username</label>
                            <input type="text" id="title" name="db-user" value="{{Config::get('database.connections.mysql.username')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Password</label>
                            <input type="text" id="title" name="db-pwd" value="{{Config::get('database.connections.mysql.password')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Name</label>
                            <input type="text" id="title" name="db-name" value="{{Config::get('database.connections.mysql.database')}}" class="form-control">
                        </div>
                </div>
                <div class="box-footer">
                        <p><strong>Important</strong>: If the values in this form are entered incorrectly and/or cannot connect to the database using the new values, you will only be able to change them via the config file in the file system.</p>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
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