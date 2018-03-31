@extends('layouts.main')
@section('title', 'Log In')
@section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Log In</h2>
                    @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="{{route('login')}}" method="post">
                    @csrf
						<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required autofocus>	
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Log In">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
@endsection