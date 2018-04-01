@extends('layouts.main')
@section('title', 'Terms &amp; Conditions')
@section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Terms &amp; Conditions</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="#">
						<div class="row">
							<div class="col-md-12">
								@if($terms->data !== '')
                                {{$terms->data}}
                                @else
                                No Terms &amp; Conditions provided.
                                @endif
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
@endsection