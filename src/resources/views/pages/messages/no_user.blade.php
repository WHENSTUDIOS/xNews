@extends('layouts.main')
@section('title', 'No Such User')
@section('main_content')
<div id="fh5co-main">
		<div class="container">

			<div class="row">
        <div id="fh5co-board" data-columns>
            <center><h1>User not found!</h1>
                <p>We were unable to find a user with the username "{{$name}}".</p>
            </center>
        </div>
        </div>
       </div>
	</div>
@endsection