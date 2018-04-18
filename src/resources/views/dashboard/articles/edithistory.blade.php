@extends('dashboard.templates.dashboard') @section('title', 'Edit History') @section('page_title', 'Edit History') @section('page_description',
$post->title) @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
          @foreach($histories as $history)
          <input type="hidden" value="{{$i++}}">
          <div class="box box-solid" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">[<strong>{{$history->changeid}}</strong>] - Change #{{$i}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p>{{$history->changes}}</p>
                <small><cite>{{$history->user['name']}}</cite></small>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          @endforeach
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection