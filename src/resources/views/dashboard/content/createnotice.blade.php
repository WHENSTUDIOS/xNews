@extends('dashboard.templates.dashboard') @section('title', 'New Notice') @section('page_title', 'New Notice') 
@section('page_description', 'New Notice') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @include('dashboard.dashboard.messages')
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">New Notice</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/content/notices/create')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" data-lpignore="true" class="form-control" name="title"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <textarea name="content" class="form-control" id="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <select id="color" name="color" class="form-control">
                                <option id="2" value="danger">Red</option>
                                <option id="3" value="success">Green</option>
                                <option id="4" value="info">Blue</option>
                                <option id="5" value="warning">Yellow</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{url('dashboard/content/notices')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
    </div>
</section>
@endsection