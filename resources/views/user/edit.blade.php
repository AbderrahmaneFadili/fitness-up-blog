@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="h-screen text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-7 rounded-lg">
                <h1 class="text-3xl">Edit your account.</h1>
                <div class="mx-auto max-w-screen-sm my-11">
                    <form action="/" method="POST">
                        {{-- Name --}}
                        <div class="mb-4">
                            <input type="text" id="name" name="name" placeholder="Write your name..."
                                class="w-full border-2  pl-3 outline-none p-2" />
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <input type="email" id="email" name="email" placeholder="Write your email..."
                                class="w-full border-2  pl-3 outline-none p-2" />
                        </div>

                        {{-- Password --}}
                        <div class="mb-4">
                            <input type="password" id="password" name="password" placeholder="Write your password..."
                                class="w-full border-2  pl-3 outline-none p-2" />
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="mb-4">
                            <input type="password" id="confirm_passowrd" name="confirm_passowrd"
                                placeholder="Confirm your password..." class="w-full border-2  pl-3 outline-none p-2" />
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="w-full text-white bg-gray-900 p-2 rounded-lg text-lg">Edit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
