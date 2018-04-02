@extends('dashboard.templates.dashboard') @section('title', 'Database Info') @section('page_title', 'Edit Database Info') @section('page_description',
'MySQL database information') @section('main_content')
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
                @elseif(isset($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                            {{$error}}
                    </div>
                    @endforeach
                @endif
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