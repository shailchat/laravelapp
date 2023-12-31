@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Employees List</h1>
        <a href="#">Add employee</a>
        <table class="w-full">
            <tr>
                <th>Name</th>
                <th>Options</th>
            </tr>
            @foreach($employees as $employee)

                <tr>
                    <td><a href={{ url('/employees/'.$employee->id) }}>{{ $employee->name }}</h2></td>
                    <td>
                        <a href="{{ url('/employees/'.$employee->id.'/edit')}}">Update</a>
                        <form method="post" action="{{ url('/employees/'.$employee->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('are you sure?')">delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>


        <div class="my-10">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
