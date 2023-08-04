@extends('layouts.frontend.layouts')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Students List</h1>

        <table class="w-full">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Action</th>
            </tr>
            @foreach($students as $student)

                <tr>
                    <td>{{ $student->studentid }}</td>
                    <td><a href={{ url('/students/'.$student->id) }}>{{ $student->studentname }}</td>
                    <td>
                        <a href="{{ url('/students/'.$student->id.'/restore')}}">Restore</a>
                        <form method="post" action="{{ url('/students/'.$student->id.'/force') }}">
                            @csrf
                            @method('delete')
                        <button type="submit"  onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </table>
        </div>
@endsection
