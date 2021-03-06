@extends('layouts.main')
@section('title', 'Register')
@section('main_content')
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Register</h2>
                    @if ($errors->has('password'))
                        <p><span class="error"><strong>Error</strong>: {{ $errors->first('password') }}</span></p>
                    @endif
                    @if ($errors->has('name'))
                        <p><span class="error"><strong>Error</strong>: {{ $errors->first('name') }}</span></p>
                    @endif
                    @if ($errors->has('email'))
                        <p><span class="error"><strong>Error</strong>: {{ $errors->first('email') }}</span></p>
                    @endif
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="{{ route('register') }}" method="post">
                    @csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Username" required>	
								</div>
							</div>
							<div class="col-md-6">
                                <div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
								</div>
							</div>
							<div class="col-md-12">
                                <div class="form-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
								<p><small><input type="checkbox" required> I accept the <a href="terms">Terms &amp; Conditions</a> of {{ Config::get('site.data.name') }}</small></p>
									<input type="submit" class="btn btn-primary" value="Register">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
@endsection