<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="{{set_active('simulation/quicksim')}}" href="{{ URL::to('simulation/quicksim') }}"><i class="fa fa-dashboard fa-fw"></i> Quick simulation</a>
                        </li>
                        <li>
                            <a class="{{set_active('simulation/runsimulation')}}" href="{{ URL::to('simulation/runsimulation') }}"><i class="fa fa-youtube-play"></i> Run simulation</a>
                        </li>
                        <li>
                            <a class="{{set_active('simulation/simulation_result')}}" href="{{ URL::to('simulation/simulation_result') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Simulation result</a>
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            
            