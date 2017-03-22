<nav class="navbar navbar-default navbar-1">
    <div class="container-fluid container1">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="/images/New_Cassel.png" class="img-responsive img-brand">
            </a>
            <a class="navbar-brand navtext" href="#">New Cassel Center's <br>Work Order System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-list">

                @if (Auth::check())

                    <li class="home"><a href="{{ url('/home') }}"><i class="fa fa-btn fa-fw fa-home" aria-hidden="true"></i>&nbsp;Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-btn"></i><i class="fa fa-btn fa-fw fa-wrench"></i>Work Order<i class="fa fa-btn"></i><span class="caret"></span><i class="fa fa-btn"></i></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/workorder') }}"><i class="fa fa-btn fa-fw fa-file-text-o" aria-hidden="true"></i>Work Order Form</a></li>
                            <li><a href="{{ url('/workorderview') }}"><i class="fa fa-btn fa-fw fa-list-ol" aria-hidden="true"></i>Work Order List</a></li>
                        </ul>
                    </li>

                    @role('admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Manage Application<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/center') }}"><span><i class="fa fa-btn fa-fw fa-university" aria-hidden="true"></i>&nbsp;&nbsp;Center</span></a></li>

                            <li><a href="{{ url('/apartment') }}"><span><i class="fa fa-btn fa-fw fa-building" aria-hidden="true"></i>&nbsp;&nbsp;Apartment</span></a></li>

                            <li><a href="{{ url('/resident') }}"><span><i class="fa fa-btn fa-fw fa-street-view" aria-hidden="true"></i>&nbsp;&nbsp;Resident</span></a></li>

                            <li><a href="{{ url('/rescontact') }}"><span><i class="fa fa-btn fa-fw fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;Resident Contact</span></a></li>

                            <li><a href="{{ url('/tool') }}"><span><i class="fa fa-btn fa-fw fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Tool</span></a></li>

                            <li><a href="{{ url('/Supply') }}"><span><i class="fa fa-btn fa-fw fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Supply</span></a></li>

                            <li><a href="{{ url('/commonarea') }}"><span><i class="fa fa-btn fa-fw fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Common Area/<br>
                                        <i class="fa fa-btn fa-fw" aria-hidden="true"></i><span> &nbsp;</span>System Name</span></a></li>

                            <li><a href="{{ url('/issuetype') }}"><span><i class="fa fa-btn fa-fw fa-exclamation-circle" aria-hidden="true"></i></i>&nbsp;&nbsp;Issue Type</span></a></li>

                            <li><a href="{{ url('/notifications') }}"><span><i class="fa fa-btn fa-fw fa-envelope" aria-hidden="true"></i>&nbsp; Email Notification</span></a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="fa fa-user-plus"></i>&nbsp; User Management<span class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a></li>
                            <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-fw fa-users"></i>Roles</a></li>
                        </ul>
                    </li>

                    @endrole
            </ul>
        @endif

        <!--<form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form> -->
            <ul class="nav navbar-nav navbar-right nav-bar-log">

                @if (Auth::guest())

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->getFullName() }} <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-fw fa-sign-out"></i>Logout</a>
                            </li>
                            <li><a href="{{ url('/changepasswordpage') }}"><i class="fa fa-btn fa-fw fa-lock"></i>Change
                                    Password</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



