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
                <div id="noticetable" class="box-body table-responsive no-padding">
                    @include('dashboard.content.noticetable')
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