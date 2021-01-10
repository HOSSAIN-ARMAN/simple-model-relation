<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Department -->
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="{{ route('department.show') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Department
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <!--Teacher -->

                <a class="nav-link collapsed" href="{{ route('teacher.show') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Teacher
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <!-- Student -->
                <a class="nav-link collapsed" href="{{ route('student.show') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                    Student
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>



{{--                this is dropdown way--}}

{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="false" aria-controls="collapseStudent">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>--}}
{{--                    Student--}}
{{--                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="collapseStudent" aria-labelledby="headingOne" data-parent="#sidenavAccordion">--}}
{{--                    <nav class="sb-sidenav-menu-nested nav">--}}
{{--                        <a class="nav-link" href="{{ route('student.index') }}">Add Student</a>--}}
{{--                        <a class="nav-link" href="{{ route('student.show') }}">Student-Info</a>--}}
{{--                    </nav>--}}
{{--                </div>--}}


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
        </div>
    </nav>
</div>
