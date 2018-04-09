@extends('dashboard.templates.dashboard') @section('title', 'Create Article') @section('page_title', 'Create Article') @section('page_description',
'Create a new article') @section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="POST" action="{{url('/dashboard/articles/create/new')}}">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <label>Body</label>
                        <textarea name="body" id="article-ckeditor">
                            @if(isset($template))
                            {!!$template->body!!}
                            @endif
                        </textarea>
                </div>
                <div class="box-footer">

                    <button type="submit" class="btn btn-primary">Post</button>
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