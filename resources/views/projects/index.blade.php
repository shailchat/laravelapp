@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-screen-md">
        <h1 class="font-bold text-2xl">Projects List</h1>
        <a href="{{ url('/projects/add') }}" class="btn btn-info">Add Project</a>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Created by</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>





            @foreach($projects as $key => $project)


                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><a href={{ url('/employees/'.$project->id) }}>{{ $project->name }}</h2></td>
                    <td>{{ $project->description }}</td>
                    <td>
                        {{ $project->user->name }}
                    </td>
                    <td>
                        <a href="{{ url('/projects/'.$project->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                        <form method="post" action="{{ url('/projects/'.$project->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')">delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>


        <div class="my-10">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
