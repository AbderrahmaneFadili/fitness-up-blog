<header>
    <nav class="p-6 bg-white flex flex-col md:flex-row items-center justify-between mb-6">
        {{-- logo --}}
        <h1 class="font-bold text-xl">
            <a href="/">Fitnessup.com</a>
        </h1>

        {{-- menu icon --}}
        <i class="fas fa-bars text-xl md:hidden cursor-pointer icon my-2 md:ml-3"></i>


        <ul class="flex menus items-center flex-col md:flex-row">
            <li class="my-4 lg:my-0">
                <a href="/" class="p-3  hover:bg-gray-700 duration-75 hover:text-white rounded-md">Home</a>
            </li>

            <li class="my-4 lg:my-0 mx-2">
                <a href="/about" class="p-3 hover:bg-gray-700 duration-75 hover:text-white rounded-md">About</a>
            </li>

            <li class="my-4 lg:my-0 mr-2">
                <a href="/contact" class="p-3 hover:bg-gray-700 duration-75 hover:text-white rounded-md">Contact</a>
            </li class="my-4 lg:my-0">

            <li class="my-4 blog lg:my-0">
                <a href="/blog" class="p-3  hover:bg-gray-700 duration-75 hover:text-white rounded-md">
                    Blog
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="bg-gray-700 absolute top-16 add-new-post rounded-md text-white  shadow-lg">
                    <li>
                        <a href="/blog/add" class="cursor-pointer hover:underline">Add new post</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="flex menus items-center flex-col md:flex-row">
            @guest
                <li class="my-4 lg:my-0">
                    <a href="/login" class="p-3 hover:bg-gray-700 duration-75 hover:text-white rounded-md">Login</a>
                </li>

                <li class="my-4 lg:my-0 mx-2"><a href="/register"
                        class="p-3 hover:bg-gray-700 duration-75 hover:text-white rounded-md">Register</a>
                </li>
            @endguest
            @auth
                <li class="my-4 lg:my-0">
                    <a href="/user/profile" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li class="my-4 lg:my-0">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="p-3 outline-none">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
