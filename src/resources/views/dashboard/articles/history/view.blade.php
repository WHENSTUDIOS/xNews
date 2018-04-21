@extends('dashboard.templates.dashboard') @section('title', 'Edit History') @section('page_title', 'Edit History') @section('page_description',
$history->changeid) @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title"><strong>Summary</strong>: - {!! $history->changes == null ? '<i>No changes defined.</i>' : $history->changes !!} [{{$chars}}] ({{$history->created_at->diffForHumans()}})</h3>
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
                <textarea name="body" id="article-ckeditor1" disabled>{!! $history->after !!}</textarea>
                <small><cite>{{$history->user['name']}}</cite></small>
              </blockquote>
              <a href="{{url('dashboard/articles/edit/'.$id.'/history')}}" class="btn btn-sm btn-success">Back to History</a> <button data-toggle="modal" data-target="#revert" type="button" class="btn btn-danger btn-sm" value="Revert">Revert Changes</button>
            </div>
            <div class="modal modal-warning fade" id="revert" data-vivaldi-spatnav-clickable="1" style="display: none;">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Reverse Edit</h4>
                  </div>
                  <div class="modal-body">
                      <p>You are about to revert the changes to <strong>{{$post->title}}</strong> with the change ID of <strong>{{$history->changeid}}</strong>. This cannot be undone! Are you sure you want to proceed?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                      <a href="{{url('dashboard/articles/edit/'.$id.'/history/'.$history->changeid.'/revert')}}" type="submit" class="btn btn-outline btn-warning">Revert</a>
                  </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection