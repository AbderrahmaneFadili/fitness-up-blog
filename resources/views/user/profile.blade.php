@extends('layouts.app')

@section('title', 'Abderrahamne Fadili')

@section('content')
    <div class="h-screen text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-8 rounded-lg">
                <h1 class="font-bold text-3xl">User Profile</h1>
                {{-- user information --}}
                <ul class="mt-6">
                    <li class="text-lg mb-1">Abderrahamne Fadili</li>
                    <li class="text-lg">email@email.com</li>
                </ul>
                <ul class="mt-6">
                    <li class="mb-2">
                        <a href="/user/edit/profile" class="text-white bg-gray-900 py-2 px-6 rounded-lg text-lg">Edit</a>
                    </li>
                    <li>
                        <button class="text-white bg-red-900 py-2 px-4 rounded-lg text-lg" type="submit">Delete</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
