<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('public/admin')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Post Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('posts.create',Auth::User())
                        <li><a href="{{URL::to('/create-post')}}"><i class="fa fa-circle-o"></i> Create Post</a></li>
                    @endcan

                    <li><a href="{{URL::to('/manage-post')}}"><i class="fa fa-circle-o"></i> Manage Post </a></li>
                </ul>
            </li>

            <li class="treeview">
                @can('posts.category',Auth::User())
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Category Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                @endcan
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/create-category')}}"><i class="fa fa-circle-o"></i> Create Category</a></li>
                    <li><a href="{{URL::to('/manage-category')}}"><i class="fa fa-circle-o"></i> Manage Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                @can('posts.tag',Auth::User())
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Tag Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                @endcan
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/create-tag')}}"><i class="fa fa-circle-o"></i> Create Tag</a></li>
                    <li><a href="{{URL::to('/create-menu')}}"><i class="fa fa-circle-o"></i> Create menu</a></li>
                    <li><a href="{{URL::to('/manage-tag')}}"><i class="fa fa-circle-o"></i> Manage Tag</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>User Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                   
                    <li><a href="{{URL::to('/create-user')}}"><i class="fa fa-circle-o"></i> Create Use</a></li>
                    <!--  @can('users.create',Auth::User())
                    @endcan -->
                    <li><a href="{{URL::to('/manage-user')}}"><i class="fa fa-circle-o"></i> Manage User</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Role Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('role.create')}}"><i class="fa fa-circle-o"></i> Create Role</a></li>
                    <li><a href="{{route('role.index')}}"><i class="fa fa-circle-o"></i> Manage Role</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Permission Options</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('permission.create')}}"><i class="fa fa-circle-o"></i> Create Permission</a></li>
                    <li><a href="{{route('permission.index')}}"><i class="fa fa-circle-o"></i> Manage Permission</a></li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>