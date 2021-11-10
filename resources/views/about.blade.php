@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="h-auto text-center md:text-left">
        <div class="flex justify-center">
            <div class="w-11/12 bg-white p-7 rounded-lg">
                <h1 class="text-5xl text-center font-bold">About us</h1>
                <p class="text-xl my-6 text-center">
                    Fitnessup is the best fitness blog ever , you can read and share your posts with
                    users
                </p>

                <img src="{{ asset('images/about1.jpg') }}" class="shadow-lg rounded-md mx-auto my-5" alt="About image" />

                <h1 class="text-5xl text-center my-7 font-bold">Quote</h1>
                <p class="text-xl my-9 leading-loose text-center">
                    Some people find it tougher than others to stick to their fitness and exercise schedules. Consequently,
                    they often struggle to keep weight gain at bay. Social psychologist Emily Balcetis reveals that when it
                    comes to fitness, a few of us think and see the world differently, but there’s a simple solution that
                    can tackle this problem.
                </p>

                <h1 class="text-5xl text-center my-7 font-bold">Gallery</h1>

                <div class="container grid grid-cols-3 gap-2 mx-auto">
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img1.jpg') }}" alt="image">
                    </div>
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img2.jpeg') }}" alt="image">
                    </div>
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img3.jpeg') }}" alt="image">
                    </div>
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img4.jpeg') }}" alt="image">
                    </div>
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img5.jpg') }}" alt="image">
                    </div>
                    <div class="w-full rounded">
                        <img width="100%" height="100%" src="{{ asset('images/img6.jpeg') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
