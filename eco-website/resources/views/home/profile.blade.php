@extends('home.profile_template')
@section('profilecontent')


<div class="bg-gradient-to-r from-indigo-500 text-center md:m-4 p-14 rounded-lg">
    <h3 class="text-3xl font-bold">Welcome Back {{Auth::user()->name}} &#x1F44B;</h3>
</div>

@endsection