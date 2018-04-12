@extends('dashboard.templates.dashboard')
@section('title', 'Search Users')
@section('page_title', 'Search Users')
@section('page_description', 'Find users by a quick search')
@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-success" data-vivaldi-spatnav-clickable="1">
        <form method="POST" action="{{url('dashboard/users/search/result')}}">
        @csrf
            <div class="box-header with-border">
              <h3 class="box-title">Search a User</h3>
            </div>
            <div class="box-body">
              <input class="form-control input-lg" name="q" type="text" placeholder="Username or Email Address">
              <br>
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <!-- /.box-body -->
          </div>
          </form>
            <!-- /.box -->
        </div>
    </div>
    <div>
    </div>
    </div>
    </div>
</section>
@endsection