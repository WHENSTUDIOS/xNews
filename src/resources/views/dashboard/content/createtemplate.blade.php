@extends('dashboard.templates.dashboard') @section('title', 'New Template') @section('page_title', 'New Template') 
@section('page_description', 'New Template') @section('main_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @include('dashboard.dashboard.messages')
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">New Template</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/content/templates/create')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" data-lpignore="true" class="form-control" name="title"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Template</label>
                            <textarea name="body" id="article-ckeditor"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{url('dashboard/content/templates')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
    </div>
</section>
@endsection