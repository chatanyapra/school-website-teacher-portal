    <header class="header_homepage">
        <div class="nav_burger">
            <input id="nav_checkbox" type="checkbox"  onclick="navburger()">
            <label class="navbur_toggle" for="nav_checkbox">
                <div id="nav_bar1" class="nav_bars"></div>
                <div id="nav_bar2" class="nav_bars"></div>
                <div id="nav_bar3" class="nav_bars"></div>
            </label>
        </div>
        <div class="chip_tag" onclick="logoption()">
            <img src="{{asset('assets/Ripple-1s-200px (1).gif')}}" alt="Person" width="96" height="96">
            <span class="name_box"> Chatanya pratap </span>
            <span class="front fas fas fa-angle-down"></span>
        </div>
    </header>
    <!-- -------log options------ -->
        <div class="closelog_box" onclick="closelogbox()"></div>
        <div class="log_box1" style="z-index: 20">
            <div class="box_int_log1">
                <img src="loading-gif-icon-24.jpg" alt="...img" width="70" height="90">
                <div class="content_div">
    @foreach ($search as $detail)
    @if ($loop->first)
                    <h6>{{$detail->Name}}</h6>
                    <h6>{{$detail->registrationNo}}</h6>
    @endif
    @endforeach
                </div>
            </div>
            <div class="box_int_log2">
                <a href=""><button style="font-size: 12px;" class="btn btn-dark" onclick="logoutfromsession();">Log out</button></a>
                <button style="font-size: 12px;" class="btn btn-dark" onclick="changepassword()">Change Password</button>
            </div>
        </div>
    <!-- ------------- -->
<ul class="menu">
    <li class="menu_list" onclick="dashboardfunc()">
        <span class="front fas fa-home"></span>
        <a href="#" class="side">home</a>
    </li>
    <li class="menu_list" onclick="attendancefunc()">
        <span class="front fas fa-user-check"></span>
        <a href="#" class="side">Attendance</a>
    </li>
    <li class="menu_list" onclick="registrationPage()">
        <span class="front fas fa-edit"></span>
        <a href="#" class="side">Registration</a>
    </li>
    <li class="menu_list" onclick="classTimetable()">
        <span class="front far fa-calendar-alt"></span>
        <a href="#" class="side">Timetable</a>
    </li>
    <li class="menu_list" onclick="resultMaking()">
        <span class="front fa fa-list-alt"></span>
        <a href="#" class="side">Result</a>
    </li>
</ul>