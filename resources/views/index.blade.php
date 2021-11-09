@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="h-screen text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-20 rounded-lg">
                <h1 class="text-5xl">FitnessUp Blog</h1>
                <p class="mt-4 mb-6">Read the latest posts about Fitness</p>
                <a href="/" class="text-white bg-gray-900 p-4 my-4 rounded-lg">Join us</a>
            </div>
        </div>
    </div>
@endsection
