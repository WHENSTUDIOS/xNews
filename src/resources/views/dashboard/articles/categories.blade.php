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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>
                                        <form style="display:inline !important;" action="{{url('dashboard/articles/categories/delete/'.$category->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"><a class="btn btn-success btn-xs" href="{{url('dashboard/articles/categories/edit/'.$category->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
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