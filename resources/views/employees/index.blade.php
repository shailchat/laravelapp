<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div>
            <a href="/employees/add">Add Employee</a>
            <a href="/employees">List Employees</a>
        </div>
        <h1 class="font-bold text-2xl">Employees List</h1>

        @foreach($employees as $employee)

            <div>
                <h2>{{ $employee->name }}</h2>
            </div>

        @endforeach
    </body>
</html>
