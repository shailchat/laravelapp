@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Projects List</h1>
        <a href="{{ url('/projects/add') }}">Add Project</a>
        <table class="w-full">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Created By</th>
            </tr>
            @foreach($projects as $project)

                <tr>
                    <td><a href={{ url('/employees/'.$project->id) }}>{{ $project->name }}</h2></td>
                    <td>
                        <a href="{{ url('/employees/'.$project->id.'/edit')}}">Update</a>
                        <form method="post" action="{{ url('/employees/'.$project->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('are you sure?')">delete</button>
                        </form>
                    </td>
                    <td>
                        {{ $project->user->name }}
                    </td>
                </tr>

            @endforeach
        </table>


        <div class="my-10">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
