@extends('layouts.frontend.layout')

@section('content')
<div class="container mx-auto max-w-screen-md">

    <h1 class="font-bold text-2xl">Add Employee</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="post" action={{ url('/employees')}}>

        @csrf

        <div class="flex flex-col py-3">
            <label>Name</label>
            <input type="text" name="name" class="border" value="{{ old('name') }}" />
        </div>


        <div class="flex flex-col py-3">
            <label>Email</label>
            <input type="email" name="email" class="border" value="{{ old('email') }}" />
        </div>


        <div class="flex flex-col py-3">
            <label>Joinnig Date</label>
            <input type="date" name="joiningDate" class="border" value="{{ old('joiningDate')}} " />
        </div>


        <div class="flex flex-col py-3">
            <label>Designation</label>
            <input type="text" name="designation" class="border"  value=" {{old('designation')}} " />
        </div>


        <div class="flex flex-col py-3">
            <label>Role</label>
            <input type="text" name="role" class="border"  value=" {{old('role')}} " />
        </div>


        <div>
            <button type="submit" class="bg-green-500 text-white px-5">Submit</button>
        </div>
    </form>
</div>
@endsection
