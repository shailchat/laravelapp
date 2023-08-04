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


@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endpush
