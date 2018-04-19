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
            <li><a href="{{url('dashboard/users/search')}}"><i class="fa fa-user"></i> Search User</a></li>
            <li><a href="{{url('dashboard/users/create')}}"><i class="fa fa-user-plus"></i> Add User</a></li>
            <li><a href="{{url('dashboard/users/staff')}}"><i class="fa fa-check"></i> Staff Members</a></li>
          </ul>
        </li>
        <li><a href="{{url('home')}}"><i class="fa fa-undo"></i> <span>Main Website</span></a></li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">CONFIGURATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-text-height"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('dashboard/content/wcms')}}"><i class="fa fa-clipboard"></i> wCMS</a></li>
            <li><a href="{{url('dashboard/content/templates')}}"><i class="fa fa-code"></i> Article Templates</a></li>
            <li><a href="{{url('dashboard/content/notices')}}"><i class="fa fa-bullhorn"></i> Notices</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('dashboard/settings/auth')}}"><i class="fa fa-user"></i> Authentication</a></li>
            <li><a href="{{url('dashboard/settings/database')}}"><i class="fa fa-database"></i> Database</a></li>
            <li><a href="{{url('dashboard/settings/access')}}"><i class="fa fa-universal-access"></i> Access</a></li>
            <li><a href="{{url('dashboard/settings/data')}}"><i class="fa fa-sitemap"></i> Site Data</a></li>
          </ul>
        </li>
        <li class="header">ME</li>
        <li class="treeview">
          <a href="{{url('profile/'.Auth::user()->name)}}" target="_blank">
            <i class="fa fa-user"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li><a href="{{url('logout')}}" style="background-color:#d9534f!important;"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>

      </ul>