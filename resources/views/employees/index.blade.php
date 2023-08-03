@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Employees List</h1>

        @foreach($employees as $employee)

            <div>
                <a href={{ url('/employees/'.$employee->id) }}>{{ $employee->name }}</h2>
            </div>

        @endforeach
        </div>
@endsection
