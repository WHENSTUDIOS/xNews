@extends('layouts.main') @section('title', 'Article View') @section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Edit Post <small>{{$post->title}}</small></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="../posts" method="post">
                    @csrf
						<div class="row">
						<div class="col-xl-4">
                        <label for="title">Post Title</label>
                        @if(count($errors) > 0)
                        <div class="has-error">
                        <input id="title" name="title" class="form-control" placeholder="I need a title! Don't leave me behind..." />
                        </div>
                        @else
                        <input id="title" name="title" class="form-control" placeholder="Title" />
                        @endif
                        <br>
                        <label for="title">Article Content</label>
                        <textarea id="article-ckeditor" class="form-control" name="body"></textarea>
                        <br>
							<div class="col-xl-4">
								<div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Post">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
@endsection