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
                        @if(count($categories) >= 1)
                        <div class="form-group">
                            <label>Category</label>
                            <select id="category" name="category" class="form-control">
                            <option id="none" value="0">None</option>
                                @foreach($categories as $category)
                                    <option id="{{$category->id}}" value="{{$category->id}}" {{ $post->category == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Index Visibility</label>
                            <select id="visible" name="visible" class="form-control">
                                <option id="1" value="1" {{ $post->visible === 1 ? 'selected' : '' }}>Visible</option>
                                <option id="0" value="0" {{ $post->visible === 0 ? 'selected' : '' }}>Not Visible</option>
                            </select>
                        </div>
                        <label>Body</label>
                        <textarea name="body" id="article-ckeditor">{!!$post->body!!}</textarea>
                        <br>
                        <div class="form-group">
                            <label>Changes</label>
                            <input type="text" id="changes" name="changes" class="form-control" value="" placeholder="Briefly explain what was changed in this edit...">
                        </div>
                        </div>
                <div class="box-footer">
                    <input name="_method" type="hidden" value="PUT">

                    <button type="submit" class="btn btn-primary">Save</button>
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