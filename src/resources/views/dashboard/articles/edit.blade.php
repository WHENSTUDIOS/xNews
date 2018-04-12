@extends('dashboard.templates.dashboard') @section('title', 'Edit Article') @section('page_title', 'Edit Article') @section('page_description',
$post->title) @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="POST" action="{{url('/dashboard/articles/update/'.$post->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}">
                        </div>
                        <label>Body</label>
                        <textarea name="body" id="article-ckeditor">{!!$post->body!!}</textarea>
                </div>
                <div class="box-footer">
                    <input name="_method" type="hidden" value="PUT">

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{url('dashboard/articles/list')}}" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
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