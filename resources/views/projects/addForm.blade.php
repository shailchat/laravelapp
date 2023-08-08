@extends('layouts.frontend.layout')

@section('content')
    <div class="container mx-auto max-w-sm">

        <h1 class="font-bold text-2xl text-center my-2 text-gray-800">Add Project</h1>

        <div class="py-5 border px-5 my-5 rounded-lg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{ url('/projects')}}">

                @csrf

                <div class="flex flex-col py-3">
                    <label class="text-sm font-semibold pl-1 text-gray-800">Name</label>
                    <input type="text" name="name" class="border focus:outline-none px-2 py-2 rounded-lg my-2"
                           value="{{ old('name') }}"/>
                </div>


                <div class="flex flex-col py-3">
                    <label class="text-sm font-semibold pl-1 text-gray-800">Description</label>
                    <textarea name="description" class="border focus:outline-none px-2 py-2 rounded-lg my-2"
                           value="{{ old('description') }}"></textarea>
                </div>





                <div>
                    <button type="submit" class="bg-green-500 text-white px-5 w-full py-2 rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
