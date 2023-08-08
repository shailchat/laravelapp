{{--<div class="flex justify-center space-x-5 border-b">--}}
{{--    <a href={{ url("/")}} class="font-semibold py-5 hover:text-blue-500">Home</a>--}}
{{--    <a href={{ route('addEmployeeName') }} class="font-semibold py-5 hover:text-blue-500">Add Employee</a>--}}
{{--    <a href={{ url("/employees")}} class="font-semibold py-5 hover:text-blue-500">List Employees</a>--}}
{{--    <a href={{ url("/employees/deleted")}} class="font-semibold py-5 hover:text-blue-500">Deleted Employees</a>--}}
{{--</div>--}}




{{--<div class="flex justify-center space-x-5 border-b">--}}

{{--    <a href={{ url("/index1")}} class="font-semibold py-5 hover:text-blue-500">Employees</a>--}}
{{--    <a href={{ url("/index2")}} class="font-semibold py-5 hover:text-blue-500">Students</a>--}}


{{--    <a href="{{ url("/admin-only") }}"  class="font-semibold py-5 hover:text-blue-500">Dashboard</a>--}}




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/logo.png') }}" style="width:80px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/employees') }}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/students') }}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/projects') }}">Projects</a>
                </li>




                    @guest
                    <li class="nav-item">
                        <a href={{ url("/register")}} class="font-semibold py-5 hover:text-blue-500">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url("/login")}} class="font-semibold py-5 hover:text-blue-500">Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                           class="font-semibold py-5 hover:text-blue-500"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            Logout
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
                </div>


            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
