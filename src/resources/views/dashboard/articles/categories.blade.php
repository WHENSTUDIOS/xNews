@extends('dashboard.templates.dashboard')
@section('title', 'Categories')
@section('page_title', 'Article Categories')
@section('page_description', 'Manage article categories')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @include('dashboard.dashboard.messages')
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($categories) <= 0)
                            <center>No categories to display.</center>
                            <br>
                            @else  
                            <tr>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                            <input type="hidden" value="{{$i = 0}}">
                                @foreach($categories as $category)
                                <input type="hidden" value="{{$i++}}">
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>
                                        <form style="display:inline !important;" action="{{url('dashboard/articles/categories/delete/'.$category->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"><a class="btn btn-success btn-xs" href="{{url('dashboard/articles/categories/edit/'.$category->id)}}">Edit</a> | <button data-toggle="modal" data-target="#delete{{$i}}" type="button" class="btn btn-danger btn-xs" value="Delete">Delete</button></td>
                                        <div class="modal modal-danger fade" id="delete{{$i}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Deletion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to delete <strong>{{$category->name}}</strong>. This cannot be undone. Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-outline">Delete</button>
                                                </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <a href="{{url('dashboard/articles/categories/create')}}" class="btn btn-primary">New Category</a>
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