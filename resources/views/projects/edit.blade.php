@extends('layouts.frontend.layout')

@section('content')
<div class="container mx-auto max-w-screen-md">

    <h1 class="font-bold text-2xl">Update Project</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="post" action="{{ url('/projects/'.$project->id)}}">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $project->name }}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email">
            {{--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description"  class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email">{{ $project->description }}</textarea>
            {{--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
        </div>

        <div>
            <button type="submit" class="btn btn-success">Update Employee Date</button>
        </div>
    </form>
</div>
@endsection
