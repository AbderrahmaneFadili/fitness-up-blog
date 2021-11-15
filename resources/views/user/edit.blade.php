@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="h-screen text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-7 rounded-lg">
                <h1 class="text-3xl">Edit your account.</h1>
                <div class="mx-auto max-w-screen-sm my-11">

                    @if (session('status'))
                        <div class="bg-green-500 p-4 my-3 mx-auto max-w-screen-sm rounded-md">
                            <strong class="text-xl">{{ session('status') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('user.profile.edit', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="mb-4">
                            <input type="text" id="name" name="name" placeholder="Write your name..."
                                class="w-full border-2  pl-3 outline-none p-2 @error('name')
                                 border-red-500 @enderror"
                                value='{{ $user->name }}' />
                        </div>

                        @error('name')
                            <p class="text-red-500 my-3">
                                {{ $message }}</p>
                        @enderror

                        {{-- Email --}}
                        <div class="mb-4">
                            <input type="email" id="email" name="email" placeholder="Write your email..."
                                class="w-full border-2  pl-3 outline-none p-2 @error('email')
                                 border-red-500 @enderror"
                                value='{{ $user->email }}' />
                        </div>

                        @error('email')
                            <p class="text-red-500 my-3">
                                {{ $message }}</p>
                        @enderror

                        {{-- Password --}}
                        <div class="mb-4">
                            <input type="password" id="password" name="password" placeholder="New password..."
                                class="w-full border-2  pl-3 outline-none p-2  @error('password')
                                 border-red-500 @enderror" />
                        </div>

                        @error('password')
                            <p class="text-red-500 my-3">{{ $message }}</p>
                        @enderror

                        {{-- Password Confirmation --}}
                        <div class="mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm your new password"
                                class="w-full border-2   @error('password')
                                 border-red-500 @enderror pl-3 outline-none p-2"
                                value='{{ old('password_confirmation') }}' />
                        </div>

                        {{-- submit --}}
                        <div class="mb-4">
                            <button type="submit" class="w-full text-white bg-gray-900 p-2 rounded-lg text-lg">Edit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
