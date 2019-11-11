@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin-myprofile') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('user.records') }}">
                    <i class="fa fa-home"></i>
                    <span>Manage Users</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin-myprofile') }}">
                    <i class="fa fa-home"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li>
                <a href="/events">
                    <i class="fa fa-home"></i>
                    <span>Event Management</span>
                </a>
            </li>

            <li>
                <a href="{{ route('salary_groups.index') }}">
                    <i class="fa fa-group"></i>
                    <span>Salary Groups</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('employees.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Employees</span>
                </a>
            </li>
            
            
            
            <li>
                <a href="{{ route('employee_funds.index') }}">
                    <i class="fa fa-money"></i>
                    <span>Employee-funds</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('salaries.index') }}">
                    <i class="fa fa-money"></i>
                    <span>Generate Salary</span>
                </a>
            </li>
            

                <li class="{{ request()->is('admin/allowances') || request()->is('admin/allowances/*') ? 'active' : '' }}">
                    <a href="{{ route("allowances.index") }}">
                        <i class="fa fas fa-cogs">

                        </i>
                        <span>Allowances</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/deductions') || request()->is('admin/deductions/*') ? 'active' : '' }}">
                    <a href="{{ route("deductions.index") }}">
                        <i class="fa fa-cogs">

                        </i>
                        <span>Deductions</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/advances') || request()->is('admin/advances/*') ? 'active' : '' }}">
                    <a href="{{ route("advances.index") }}">
                        <i class="fa fa-cogs">

                        </i>
                        <span>Advances</span>
                    </a>
                </li>

                <li class=""><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <i class="fa fa-sign-out"></i> <span>Sign-Out</span></a>
                </li>

        </ul>
    </section>
</aside>

