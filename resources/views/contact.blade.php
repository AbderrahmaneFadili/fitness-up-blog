@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="h-auto text-center md:text-left">
        <div class="flex justify-center mb-4">
            <div class="w-11/12 bg-white p-7 rounded-lg">
                <h1 class="text-4xl font-bold">Get in touch</h1>
                <p class="tex-2xl text-gray-800 w-72 my-5">
                    Lorem ipsum dolor sit amet consectetur adipisicingelit. Minus molestiae eligendi
                    temporibus incidunt veniam harum.
                </p>
                <address>
                    101000 Morocco
                    Hay El farah , Takadoum , Rabat
                </address>

                <ul class="flex flex-col w-44 mt-4">
                    <li class="flex justify-between items-center">
                        <i class="fas fa-phone-alt"></i>
                        +1 (555) 388-3289
                    </li>
                    <li class="flex justify-between items-center">
                        <i class="fas fa-envelope"></i>
                        example@email.com
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
