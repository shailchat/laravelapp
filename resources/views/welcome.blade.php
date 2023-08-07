<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STPI</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="antialiased">

<div class="flex justify-center space-x-5 border-b">

    <a href={{ url("/index1")}} class="font-semibold py-5 hover:text-blue-500">Employees</a>
    <a href={{ url("/index2")}} class="font-semibold py-5 hover:text-blue-500">Students</a>
</div>

@include('layouts.frontend.partials.footer')
</body>
</html>
