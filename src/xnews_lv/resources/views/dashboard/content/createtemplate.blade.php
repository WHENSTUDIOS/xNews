@extends('dashboard.templates.dashboard') @section('title', 'New Template') @section('page_title', 'New Article Template') @section('page_description',
'Create a new template for new articles') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
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
                    <h3 class="box-title">New Template</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/content/templates/create)}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" data-lpignore="true" class="form-control" name="title" placeholder="Username" value="{{$user->name}}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Template</label>
                            <input type="text" data-lpignore="true" class="form-control" name="body" placeholder="example@example.com" value="{{$user->email}}"
                                autocomplete="new-password" required />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
    </div>
</section>
@endsection