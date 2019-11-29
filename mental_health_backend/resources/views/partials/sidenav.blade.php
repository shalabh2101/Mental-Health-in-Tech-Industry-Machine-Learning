<div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/dashboard" class="simple-text logo-normal">
            Mental Health
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ $sidenav == "dashboard" ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./user.html">--}}
{{--                    <i class="material-icons">person</i>--}}
{{--                    <p>Person</p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item {{ $sidenav == "appointments" ? 'active' : '' }} ">
                <a class="nav-link" href="/survey/start">
                    <i class="material-icons">content_paste</i>
                    <p>Survey</p>
                </a>
            </li>

            <li class="nav-item {{ $sidenav == "manage_survey" ? 'active' : '' }} ">
                <a class="nav-link" href="/survey/list">
                    <i class="material-icons">content_paste</i>
                    <p>Manage Survey</p>
                </a>
            </li>

{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./typography.html">--}}
{{--                    <i class="material-icons">library_books</i>--}}
{{--                    <p>Typography</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./icons.html">--}}
{{--                    <i class="material-icons">bubble_chart</i>--}}
{{--                    <p>Icons</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./map.html">--}}
{{--                    <i class="material-icons">location_ons</i>--}}
{{--                    <p>Maps</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./notifications.html">--}}
{{--                    <i class="material-icons">notifications</i>--}}
{{--                    <p>Notifications</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a class="nav-link" href="./rtl.html">--}}
{{--                    <i class="material-icons">language</i>--}}
{{--                    <p>RTL Support</p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item active-pro ">
                <a class="nav-link" href="/logout">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
