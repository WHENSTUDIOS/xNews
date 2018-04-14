@extends('dashboard.templates.dashboard')
@section('title', 'Article Templates')
@section('page_title', 'Article Templates')
@section('page_description', 'Manage templates for new articles')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-6">
        @include('dashboard.dashboard.messages')
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
                                        <td>
                                            @if($template->status == '0')
                                            Inactive
                                            @elseif($template->status == '1')
                                            Active
                                            @endif
                                        </td>
                                        @if($template->status == '0')
                                        <form action="{{url('dashboard/content/templates/active/'.$template->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-primary btn-xs" value="Make Active"> |
                                        </form>
                                        @elseif($template->status == '1')
                                        <form action="{{url('dashboard/content/templates/inactive/'.$template->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-warning btn-xs" value="Make Inactive"> |
                                        </form>
                                        @endif
                                        <form style="display:inline !important;" action="{{url('dashboard/content/templates/delete/'.$template->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"><a class="btn btn-success btn-xs" href="{{url('dashboard/content/templates/edit/'.$template->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <a href="{{url('dashboard/content/templates/create')}}" class="btn btn-primary">New Template</a>
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
                        @if(!isset($activetemplate)) <div class="form-group">
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