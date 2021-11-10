@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="h-screen text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-7 rounded-lg">
                <h1 class="text-3xl">Login now.</h1>
                <div class="mx-auto max-w-screen-sm my-11">
                    @if (session('status'))
                        <div class="bg-red-300 p-2 mb-4 pl-4 rounded-md w-full">
                            <p class="text-red-900 font-bold">{{ session('status') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        {{-- Email --}}
                        <div class="mb-4">
                            <input type="email" id="email" name="email" placeholder="Write your email..."
                                class="w-full border-2  pl-3 outline-none p-2 @error('email')
                                 border-red-500 @enderror" />
                        </div>

                        @error('email')
                            <p class="text-red-500 my-3">{{ $message }}</p>
                        @enderror

                        {{-- Password --}}
                        <div class="mb-4">
                            <input type="password" id="password" name="password" placeholder="Write your password..."
                                class="w-full border-2  pl-3 outline-none p-2  @error('password')
                                 border-red-500 @enderror" />
                        </div>

                        @error('password')
                            <p class="text-red-500 my-3">{{ $message }}</p>
                        @enderror

                        <div class="mb-4">
                            <button type="submit"
                                class="w-full text-white bg-gray-900 p-2 rounded-lg text-lg">login</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
