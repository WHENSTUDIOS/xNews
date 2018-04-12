@extends('dashboard.templates.dashboard') @section('title', 'Data Settings') @section('page_title', 'Data Control') @section('page_description',
'Set & maintain the main website data') @section('main_content')
<section class="content">
    <div class="row">
    <div class="col-md-12">
    @include('dashboard.dashboard.messages')
        <!-- left column -->
            <!-- general form elements -->
        <!-- general form elements -->
        <div class="box box-danger" data-vivaldi-spatnav-clickable="1">
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
    </div>
</section>
@endsection