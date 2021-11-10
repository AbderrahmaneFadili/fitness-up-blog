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
                        <button id='delete-account' class="text-white bg-red-900 py-2 px-4 rounded-lg text-lg"
                            type="submit">Delete</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Overlay --}}
    <div class="fixed overlay hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-0"></div>

    {{-- Modal Content --}}
    <div id="my-modal"
        class="absolute hidden  inset-y-1/4 left-1/3 h-52 p-5 border w-96 shadow-lg rounded-md bg-white z-20">
        <div class="mt-3 text-center">

            <h3 class="leading-8 mb-9 text-2xl font-medium text-gray-900">Do you want to remove your Account ?</h3>

            <div class="items-center px-4 py-3">
                <form action="/user/delete" method="post">
                    <button type="submit" id="ok-btn"
                        class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2">
                        OK
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
