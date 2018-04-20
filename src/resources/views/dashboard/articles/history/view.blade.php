@extends('dashboard.templates.dashboard') @section('title', 'Edit History') @section('page_title', 'Edit History') @section('page_description',
$history->changeid) @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title"><strong>Summary</strong>: - {!! $history->changes == null ? '<i>No changes defined.</i>' : $history->changes !!} ({{$history->created_at->diffForHumans()}})</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p>Before</p>
                <textarea name="body" id="article-ckeditor" disabled>{!! $history->before !!}</textarea>
                <small><cite>{{$history->user['name']}}</cite></small>
              </blockquote>
              <blockquote>
                <p>After</p>
                <textarea name="body" id="article-ckeditor" disabled>{!! $history->after !!}</textarea>
                <small><cite>{{$history->user['name']}}</cite></small>
              </blockquote>
              <a href="{{url('dashboard/articles/edit/'.$history->post)}}" class="btn btn-sm btn-success">Back to History</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection