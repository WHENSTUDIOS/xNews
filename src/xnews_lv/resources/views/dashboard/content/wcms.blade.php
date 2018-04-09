@extends('dashboard.templates.dashboard') @section('title', 'wCMS') @section('page_title', 'wCMS') @section('page_description',
'Edit the main data on the website') @section('main_content')
<section class="content">
    <div class="row">
    <div class="col-md-6">
    @include('dashboard.dashboard.messages')
        <!-- left column -->
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit {{ Config::get('site.data.name') }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="{{url('dashboard/content/wcms/general')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Name</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-name" placeholder="Site Name" value="{{ Config::get('site.data.name') }}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">URL</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-url" placeholder="Full URL" value="{{ Config::get('site.data.url') }}"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select id="level" name="edit-lang" class="form-control">
                                <option id="1" value="en" {{ Config::get('app.locale') === 'en' ? 'selected' : '' }}>en-US</option>
                                <option id="2" value="fr" {{ Config::get('app.locale') === 'fr' ? 'selected' : '' }}>FR</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="col-md-6">
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