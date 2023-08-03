<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">

        <div>
            <a href="/employees/add">Add Employee</a>
            <a href="/employees">List Employees</a>
        </div>
    </body>
</html>
