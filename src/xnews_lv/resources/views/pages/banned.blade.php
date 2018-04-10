@extends('layouts.main')
@section('title', 'Banned')
@section('main_content')
<div id="fh5co-main">
		<div class="container">

			<div class="row">
        <div id="fh5co-board" data-columns>
            <center><h1>You're banned!</h1>
                <p>Sorry, but you are currently banned from posting or viewing {{Config::get('site.data.name')}}.</p>
            </center>
        </div>
        </div>
       </div>
	</div>
@endsection