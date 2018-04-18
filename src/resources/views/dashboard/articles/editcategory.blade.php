@extends('dashboard.templates.dashboard') @section('title', 'Edit Category') @section('page_title', 'Edit Category') 
@section('page_description', $category->name) @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @include('dashboard.dashboard.messages')
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/articles/categories/edit/'.$category->id)}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" value="{{$category->name}}" data-lpignore="true" class="form-control" name="name"
                                autocomplete="new-password" required />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{url('dashboard/articles/categories')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
    </div>
</section>
@endsection