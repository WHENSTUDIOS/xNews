@extends('dashboard.templates.dashboard')
@section('title', 'Notices')
@section('page_title', 'Notices')
@section('page_description', 'Manage index notices')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        @include('dashboard.dashboard.messages')
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Notices</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        @if(count($notices) <= 0)
                            <center>No notices to display.</center>
                            <br>
                            @else  
                            <tr>
                                <th>Template Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>{{$notice->name}}</td>
                                        <td>
                                            @if($notice->status == '0')
                                            Inactive
                                            @elseif($notice->status == '1')
                                            Active
                                            @endif
                                        </td>
                                        @if($notice->status == '0')
                                        <form action="{{url('dashboard/content/notices/active/'.$notice->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-primary btn-xs" value="Make Active"> |
                                        </form>
                                        @elseif($notice->status == '1')
                                        <form action="{{url('dashboard/content/notices/inactive/'.$notice->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-warning btn-xs" value="Make Inactive"> |
                                        </form>
                                        @endif
                                        <form style="display:inline !important;" action="{{url('dashboard/content/notices/delete/'.$notice->id)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"><a class="btn btn-success btn-xs" href="{{url('dashboard/content/notices/edit/'.$notice->id)}}">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <a href="{{url('dashboard/content/notices/create')}}" class="btn btn-primary">New Notice</a>
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