<header class="bg-blue-900 text-white">
    <nav class="max-w-screen-xl relative mx-auto p-3 flex align-middle items-center">
        {{-- logo --}}
        <h1 class="text-2xl">
            <a href="/">Fitnessup</a>
        </h1>
        {{-- toggle menu icon --}}
        <i class="fas fa-bars text-3xl hidden"></i>
        {{-- Menu --}}
        <ul class="flex align-middle items-center w-72 justify-between ml-24">
            <li><a href="/">Home</a></li>
            <li><a href="/">About</a></li>
            <li><a href="/">Contact us</a></li>
            <li>
                <span class="cursor-pointer blog w-4">
                    Blog <i class="fas fa-chevron-down ml-2"></i>
                </span>

                <ul class="hidden p-3 absolute dropdown rounded-md shadow-md bg-white text-blue-900">
                    <li class="my-2"><a href="/">Aerobic</a></li>
                    <li class="my-2"><a href="/">Muscle strengthening</a></li>
                    <li class="my-2"><a href="/">Flexibility</a></li>
                </ul>
            </li>
        </ul>
        {{-- login & register & user --}}
        <ul class="flex align-middle items-center ml-auto w-48 justify-between">
            <li><a href="/">Login</a></li>
            <li><a href="/">Register</a></li>
            <li>
                <img class="cursor-pointer user w-10 rounded-full"
                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80"
                    alt="user photo">
                <ul class="hidden p-3 absolute dropdown-user rounded-md shadow-md bg-white text-blue-900">
                    <li class="my-2"><a href="/">Edite profile</a></li>
                    <li class="my-2"><a href="/">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
