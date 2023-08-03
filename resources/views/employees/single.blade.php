@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Employees: {{ $employee->name }}</h1>
        <table>
            <tr>
                <td>ID:</td>
                <td>{{ $employee->empId }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $employee->email }}</td>
            </tr>
            <tr>
                <td>Joining date:</td>
                <td>{{ $employee->joiningDate }}</td>
            </tr>
            <tr>
                <td>Role:</td>
                <td>{{ $employee->role }}</td>
            </tr>
            <tr>
                <td>Designation:</td>
                <td>{{ $employee->designation }}</td>
            </tr>
        </table>
        </div>
@endsection
