@extends('dashboard.templates.dashboard') @section('title', 'New Category') @section('page_title', 'New Category') 
@section('page_description', 'Create a new category') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @include('dashboard.dashboard.messages')
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/content/categories/create')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" data-lpignore="true" class="form-control" name="name"
                                autocomplete="new-password" required />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{url('dashboard/content/categories')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
    </div>
</section>
@endsection