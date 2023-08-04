@extends('layouts.frontend.layouts')

@section('content')
<div class="container mx-auto max-w-screen-md">

    <h1 class="font-bold text-2xl">Add Students</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="post" action={{ url('/students')}}>

        @csrf

        <div class="flex flex-col py-3">
            <label>Student Name</label>
            <input type="text" maxlength="50"  name="studentname" class="border" value="{{ old('studentname') }}"  />
        </div>


        <div class="flex flex-col py-3">
            <label>Father Name</label>
            <input type="text" name="stfathername" class="border" maxlength="50" value="{{ old('stfathername') }}"  />
        </div>


        <div class="flex flex-col py-3">
            <label>Student DoB</label>
            <input type="date" name="studentdob" class="border" value="{{ old('studentdob')}}" maxlength="10"/>
        </div>


        <div class="flex flex-col py-3">
            <label>Gender</label>
             <select class="border" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>


        <div class="flex flex-col py-3">
            <label>Contact No.</label>
            <input type="text" name="telephone" class="border"  value=" {{old('telephone')}} " maxlength="10" />
        </div>

        <div class="flex flex-col py-3">
            <label>Email ID</label>
            <input type="email" name="email" class="border"  value=" {{old('email')}} " maxlength="50"/>
        </div>


        <div>
            <button type="submit" class="bg-blue-500 text-white px-5">Submit</button>
        </div>
    </form>
</div>
@endsection
