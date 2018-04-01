@extends('layouts.main') @section('title', 'Article View') @section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Create Post</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="lib/handlers/newarticle.php" method="post">
                    @csrf
						<div class="row">
						<div class="col-xl-4">
                        <label for="title">Post Title</label>
                        <input id="title" name="title" class="form-control" placeholder="Title" />
                        <br>
                        <label for="title">Article Content</label>
                        <textarea id="article-ckeditor" class="form-control" name="editor"></textarea>
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