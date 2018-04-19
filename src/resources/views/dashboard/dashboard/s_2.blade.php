<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN TOOLS</li>
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('dashboard/articles/list')}}"><i class="fa fa-list"></i> All Articles</a></li>
            <li><a href="{{url('dashboard/articles/create')}}"><i class="fa fa-edit"></i> Create New</a></li>
            <li><a href="{{url('dashboard/articles/categories')}}"><i class="fa fa-tags"></i> Categories</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('dashboard/users/list')}}"><i class="fa fa-list"></i> All Users</a></li>
          </ul>
        </li>
        <li class="header">ME</li>
        <li class="treeview">
        <a href="{{url('profile/'.Auth::user()->id)}}" target="_blank">
            <i class="fa fa-user"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li><a href="{{url('logout')}}" style="background-color:#d9534f!important;"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>

      </ul>