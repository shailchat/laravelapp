@extends('layouts.frontend.layouts')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Student : {{ $student->studentname }}</h1>
        <table>
            <tr>
                <td>Student ID :</td>
                <td>{{ $student->studentid }}</td>
            </tr>
            <tr>
                <td>Father Name :</td>
                <td>{{ $student->stfathername }}</td>
            </tr>
            <tr>
                <td>Date of Birth :</td>
                <td>{{ $student->studentdob }}</td>
            </tr>
            <tr>
                <td>Contact No. :</td>
                <td>{{ $student->telephone }}</td>
            </tr>
            <tr>
                <td>Email ID :</td>
                <td>{{ $student->email }}</td>
            </tr>
        </table>
        </div>
@endsection
