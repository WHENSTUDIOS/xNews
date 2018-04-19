@extends('layouts.main') @section('title', 'Edit Profile') @section('main_content')
<div id="fh5co-main">
		<div class="container">
        @if(Session::get('success'))
        <div class="success">
            <h4 class="success" style="text-align:center"><strong>Success</strong>: {{Session::get('success')}}</h4>
        </div>
        @endif
			<div class="row">
				<div class="col-md-5">
					<h2>Edit My Profile <small>{{$user->name}}</small></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="{{url('profile/edit/profile')}}" method="post">
                    @csrf
						<div class="row">
						<div class="col-xl-4">
                        <label for="title">Username</label>
                        <input type="text" id="" name="name" class="form-control" required value="{{$user->name}}" title="The username cannot be edited. Contact an administrator to change your username." {{Config::get('site.data.allow_username_change') == 'true' ? '' : 'disabled="disabled"'}}/>
                        <br>
                        <label for="title">Email Address</label>
                        <input type="text" id="" name="email" class="form-control" required value="{{$user->email}}"/>
                        <br>
                        <label for="title">About Me</label>
                        <textarea style="resize:vertical;" rows="8" max="2000" class="form-control" name="bio">{!! strip_tags($social->bio) !!}</textarea>
                        <br>
							<div class="col-xl-4">
								<div class="form-group">
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
								</div>
							</div>
						</div>
					</form>
					
				</div>
                
                
        		
        	</div>
            <div class="col-md-5 col-md-offset-2">
					<h2>Social Details <small>{{$user->name}}</small></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form method="POST" autocomplete="nope" action="{{url('profile/edit/social')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Twitter</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="twitter" value="{{$social->twitter}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="instagram" value="{{$social->instagram}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                            <input type="text" name="facebook" value="{{$social->facebook}}" class="form-control" placeholder="Full Profile URL">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">YouTube</label>
                        <div class="input-group">
                            <span class="input-group-addon">youtube.com/</span>
                            <input type="text" name="youtube" value="{{$social->facebook}}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Skype</label>
                            <input type="text" name="skype" value="{{$social->facebook}}" class="form-control" placeholder="Username">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save Social Settings</button>
                </div>
            </form>
					
				</div>
       </div>
	</div>
@endsection