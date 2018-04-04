@extends('dashboard.templates.dashboard')
@section('title', 'Article Templates')
@section('page_title', 'Article Templates')
@section('page_description', 'Manage templates for new articles')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-6">
        @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    </div>
                @endif
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Templates</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($templates) <= 0)
                            <center>No templates to display.</center>
                            @else  
                            <tr>
                                <th>Template Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($templates as $template)
                                    <tr>
                                        <td>{{$template->name}}</td>
                                        <td>{{$template->status}}</td>
                                        <form action="{{url('dashboard/settings/templates/delete/'.$template->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-success btn-xs" href="{{url('dashboard/settings/templates/edit/'.$template->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <a href="dashboard/content/templates/create" class="btn btn-primary">New Template</a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Active Template</h3>
                </div>
                <div class="box-body pad">
                        @if(count($activetemplate) <=0 ) <div class="form-group">
                                <center>No active template found.
                                </center>
                        </div>
                        </div>
                        @else
                        <textarea name="body" disabled id="article-ckeditor">{!! $activetemplate->body !!}</textarea>
                        @endif
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div>
    </div>
    </div>
    </div>
</section>
@endsection