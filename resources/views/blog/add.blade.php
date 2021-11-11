@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class=" text-center md:text-left mb-5">
        <div class="flex justify-center ">
            <div class="w-11/12 bg-white  p-10 rounded-lg">

                <h1 class="text-3xl font-bold">Add new post.</h1>

                <div class="mx-auto max-w-screen-sm my-11">
                    <form action="{{ route('blog.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- image path --}}
                        <div
                            class="mb-2 image-path overflow-hidden  w-full border-2 pl-3 outline-none p-2 @error('image_path')
                            border-red-500 @enderror">
                            <button type="button" id='image-upload-button' class="text-gray-400">Choose image...</button>

                            <input type="file" id="image_path" name="image_path" value='{{ old('image_path') }}' />
                        </div>

                        @error('image_path')
                            <p class="text-red-500 mb-2">
                                {{ $message }}</p>
                        @enderror
                        {{-- Title --}}
                        <div class="mb-4">
                            <input type="text" id="title" name="title" placeholder="Write the post title..."
                                class="w-full border-2  pl-3 outline-none p-2 @error('title')
                                 border-red-500 @enderror"
                                value='{{ old('title') }}' />
                        </div>

                        @error('title')
                            <p class="text-red-500 my-3">
                                {{ $message }}</p>
                        @enderror

                        {{-- Post Body --}}
                        <div class="mb-2">
                            <textarea name="body" id="body" cols="30" rows="3" placeholder="Write the post body..."
                                class="w-full border-2  pl-3 outline-none p-2 @error('body') border-red-500 @enderror"></textarea>
                        </div>

                        @error('body')
                            <p class="text-red-500 my-3">
                                {{ $message }}</p>
                        @enderror

                        {{-- Post Category --}}
                        <div class="mb-4">
                            <select name="category" id="category"
                                class="w-full border-2  px-3 outline-none p-2  @error('category') border-red-500 @enderror">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        @error('category')
                            <p class="text-red-500 my-3">
                                {{ $message }}</p>
                        @enderror

                        {{-- Create post --}}
                        <div class="mb-4">
                            <button type="submit"
                                class="w-full text-white bg-gray-900 p-2 rounded-lg text-lg">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* image upload select */
        const imageUploadButton = document.getElementById("image-upload-button");
        const imagePath = document.getElementById("image_path");


        imagePath.addEventListener("change", (event) => {
            if (imagePath.files.length > 0) {
                imageUploadButton.innerHTML = 'Image selected';
            }
        });
    </script>
@endsection
