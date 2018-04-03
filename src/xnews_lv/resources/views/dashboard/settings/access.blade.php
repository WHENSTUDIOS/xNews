@extends('dashboard.templates.dashboard') @section('title', 'Access Settings') @section('page_title', 'Access Control') @section('page_description',
'Control what users can do') @section('main_content')
<section class="content">
    <div class="row">
    <div class="col-md-12">
            @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    </div>
                @elseif(isset($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                            {{$error}}
                    </div>
                    @endforeach
                @endif
        <!-- left column -->
            <!-- general form elements -->
        <!-- general form elements -->
        <div class="box box-danger" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
                <h3 class="box-title">Access Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="nope" action="{{url('dashboard/settings/access')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Debug (maintenance) mode</label>

                  <div class="radio">
                    <label>
                      <input type="radio" name="debug" id="optionsRadios1" value="debug-enabled" {{ Config::get('app.debug') === true ? 'checked' : '' }}>
                      Enabled
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="debug" id="optionsRadios2" value="debug-disabled" {{ Config::get('app.debug') === false ? 'checked' : '' }}>
                      Disabled
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">User theme switcher</label>

                  <div class="radio">
                    <label>
                      <input type="radio" name="switcher" id="optionsRadios1" value="switcher-enabled" {{ Config::get('site.data.allow-switcher') === 'true' ? 'checked' : '' }}>
                      Enabled
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="switcher" id="optionsRadios2" value="switcher-disabled" {{ Config::get('site.data.allow-switcher') === 'false' ? 'checked' : '' }}>
                      Disabled
                    </label>
                  </div>
                </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection