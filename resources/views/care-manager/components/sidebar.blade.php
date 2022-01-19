<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" target="_blank" class="simple-text logo-mini"><img src="{{ asset($setting['logo']??'') }}" width="25px" alt=""></a>
        <a href="{{ route('home') }}" target="_blank" class="simple-text logo-normal">
            QA <span class="text-capitalize">System</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">

            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>{{auth()->user()->name}} <b class="caret"></b></span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('survey.profile')}}">
                                <i class="far fa-user"></i>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('survey.reset.passoword')}}">
                                <i class="fas fa-lock"></i>
                                <span class="sidebar-normal">Reset Passoword </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @routeis('caremanager.dashboard') active @endrouteis">
                <a class="nav-link" href="{{ route('caremanager.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item @routeis('caremanager.survey') active @endrouteis">
                <a class="nav-link" href="{{ route('caremanager.survey') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Survey</p>
                </a>
            </li>
            <li></li>
            <li class="nav-item @routeis('caremanager.caregiver.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#caremanager">
                    <i class="material-icons">groups</i><p>CAREGiver<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('caremanager.caregiver.*') show @endrouteis" id="caremanager">
                    <ul class="nav">
                        <li class="nav-item @routeis('caremanager.caregiver.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('caremanager.caregiver.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">CAREGiver  List </span>
                            </a>
                        </li>
                        @if((auth()->user()->role == "admin") || (auth()->user()->role == "ops_manager"))
                            <li class="nav-item @routeis('caremanager.caregiver.add') active @endrouteis">
                                <a class="nav-link" href="{{ route('caremanager.caregiver.add') }}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal">CAREGiver Add </span>
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </li>
            <li class="nav-item @routeis('client.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#client">
                    <i class="material-icons">groups</i><p>Client<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('client.*') show @endrouteis" id="client">
                    <ul class="nav">
                        <li class="nav-item @routeis('client.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('client.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Client  List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('client.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('client.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Client Add </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                    <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
                    <i class="material-icons">logout</i>
                    <p> Logout </p>
                </a>
            </li>
        </ul>
    </div>
</div>
