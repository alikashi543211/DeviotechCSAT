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
                                <span class="sidebar-normal">Reset Password </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li></li>
            <li class="nav-item @routeis('survey.admin.list') active @endrouteis">
                <a class="nav-link" href="{{ route('survey.admin.list') }}">
                    <i class="material-icons">accessibility</i>
                    <p> Survey List </p>
                </a>
            </li>
            {{--<li class="nav-item @routeis('survey.admin.drafts') active @endrouteis">
                <a class="nav-link" href="{{ route('survey.admin.drafts') }}">
                    <i class="material-icons">drafts</i>
                    <p> Draft </p>
                </a>
            </li>--}}
            <li class="nav-item @routeis('admin.caremanager.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#caremanager">
                    <i class="material-icons">assignment_ind</i><p>CAREManager<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.caremanager.*') show @endrouteis" id="caremanager">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.caremanager.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.caremanager.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">CAREManager  List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.caremanager.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.caremanager.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">CAREManager Add </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item @routeis('caremanager.caregiver.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#caregiver">
                    <i class="material-icons">self_improvement</i><p>CAREGiver<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('caremanager.caregiver.*') show @endrouteis" id="caregiver">
                    <ul class="nav">
                        <li class="nav-item @routeis('caremanager.caregiver.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('caremanager.caregiver.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">CAREGiver  List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('caremanager.caregiver.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('caremanager.caregiver.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">CAREGiver Add </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>



            <li class="nav-item @routeis('client.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#client">
                    <i class="material-icons">recent_actors</i><p>Client<b class="caret"></b></p>
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

            @if(auth()->user()->role == 'admin')
            <li class="nav-item @routeis('admin.ops_manager.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#admins">
                    <i class="material-icons">people_outline</i><p>Admin Users<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.ops_manager.*') show @endrouteis" id="admins">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.ops_manager.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.ops_manager.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Admin List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.ops_manager.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.ops_manager.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Admin Add </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item @routeis('admin.services.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#services">
                    <i class="material-icons">handyman</i><p> Services<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.services.*') show @endrouteis" id="services">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.services.county') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.services.county') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">County List </span>
                            </a>
                        </li>
                        {{--<li class="nav-item @routeis('admin.services.locality') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.services.locality') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Locality List </span>
                            </a>
                        </li>--}}
                        <li class="nav-item @routeis('admin.services.province') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.services.province') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Province List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.services.who.list') active @endrouteis">
                            <a class="nav-link" href="{{route('admin.services.who.list')}}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">WHO List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.services.expect.list') active @endrouteis">
                            <a class="nav-link" href="{{route('admin.services.expect.list')}}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Expectation List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.services.quality.list') active @endrouteis">
                            <a class="nav-link" href="{{route('admin.services.quality.list')}}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Quality of life List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.services.assistance.list') active @endrouteis">
                            <a class="nav-link" href="{{route('admin.services.assistance.list')}}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Assistance Services List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @routeis('admin.patient.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#diagnose">
                    <i class="material-icons">cast</i><p>Categories<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.patient.*') show @endrouteis" id="diagnose">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.patient.category') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.patient.category') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Client Type </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.patient.visit.type') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.patient.visit.type') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Visit Type </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.patient.diagnose') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.patient.diagnose') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal">Client Condition </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item @routeis('admin.cms.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#cms">
                    <i class="material-icons">settings_suggest</i><p> CMS<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.cms.*') show @endrouteis" id="cms">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.cms.general') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.general') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> General </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
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
