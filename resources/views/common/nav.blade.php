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

                    <li class="home"><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;
                            Home <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="fa fa-wrench"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Work Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/workorder') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Work
                                    Order Form&nbsp;&nbsp;</a></li>
                            <li><a href="{{ url('/workorderview') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>
                                    &nbsp;&nbsp;&nbsp;Work Order List&nbsp;&nbsp;</a></li>
                        </ul>
                    </li>

                    @role('admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Manage Application<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/center') }}"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;&nbsp;Center</a>
                            </li>

                            <li><a href="{{ url('/apartment') }}"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;&nbsp;Apartments</a>
                            </li>

                            <li><a href="{{ url('/resident') }}"><i class="fa fa-street-view" aria-hidden="true"></i>&nbsp;&nbsp;Resident</a>
                            </li>

                            <li><a href="{{ url('/rescontact') }}"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;Resident
                                    Contact</a></li>

                            <li><a href="{{ url('/tool') }}"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Tool</a>
                            </li>

                            <li><a href="{{ url('/Supply') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Supply</a>
                            </li>

                            <li><a href="{{ url('/commonarea') }}"><span><i class="fa fa-map-marker"
                                                                            aria-hidden="true"></i>&nbsp;&nbsp;Common Area/<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System Name</span></a>
                            </li>

                            <li><a href="{{ url('/issuetype') }}"><i class="fa fa-exclamation-circle"
                                                                     aria-hidden="true"></i></i>&nbsp;&nbsp;Issue
                                    Type</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="fa fa-user-plus"></i>&nbsp; User Management<span class="caret"></span></a>
                        <ul class="dropdown-menu multi level" role="menu">
                            <li><a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a>
                            </li>
                            <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-fw fa-users"></i>Roles</a>
                            </li>
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
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
            <ul class="nav navbar-nav navbar-right">

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



