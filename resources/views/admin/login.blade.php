<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Tatik Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        'cream-bg': '#F8F8E8',
                        'card-bg': '#EADDC5',
                        'brown-btn': '#C49B58',
                        'brown-hover': '#a88448',
                        'input-bg': '#FDF1F1',
                        'text-main': '#1F2937',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cream-bg min-h-screen flex">

    <!-- Left Side: Image Background -->
    <div class="hidden md:block md:w-1/3 lg:w-[35%] relative min-h-screen">
        <div class="sticky top-0 h-screen w-full">
            <img src="{{ asset('images/tentangkami.jpeg') }}" 
                 alt="Tatik Catering Background" 
                 class="h-full w-full object-cover object-center" />
            <div class="absolute inset-0 bg-black/10"></div>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full md:w-2/3 lg:w-[65%] relative flex flex-col justify-center items-center py-24 px-6 md:px-12 lg:px-20">
        
        <!-- LOGO -->
        <div class="absolute top-10 right-6 lg:right-10 flex flex-col items-end">
            <div class="relative">
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-gray-800 relative z-10">
                    Tatik
                    <span class="ml-1">Catering</span>
                </h1>
                <svg class="absolute -bottom-2 left-4 w-32 h-6 z-0" viewBox="0 0 100 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 10 Q 50 25 100 5" stroke="#F59E0B" stroke-width="3" fill="none"/>
                </svg>
            </div>
        </div>

        <div class="w-full max-w-md">
            <div class="mb-8">
                <h2 class="text-5xl font-serif text-black mb-2">Welcome Back,</h2>
                <p class="text-gray-500 font-light text-lg">Log in now to continue</p>
            </div>

            <div class="bg-card-bg rounded-[30px] p-8 shadow-sm">
                <div class="flex justify-center mb-8">
                    <div class="flex border border-brown-btn/30 rounded-full p-1 bg-transparent">
                        <a href="{{ route('admin.register') }}" class="px-8 py-2 text-gray-700 font-medium rounded-full hover:bg-brown-btn/10 transition">
                            Daftar
                        </a>
                        <a href="#" class="px-8 py-2 bg-brown-btn text-white font-medium rounded-full shadow-md cursor-default">
                            Login
                        </a>
                    </div>
                </div>

                <!-- YANG SALAH DI SINI → DIPERBAIKI -->
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <!-- ALERT SUKSES -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-md">
                            <p class="font-bold">Sukses!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- ALERT ERROR -->
                    @if(session('error'))
                        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-md">
                            <p class="font-bold">Gagal!</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <!-- Username -->
                    <div class="mb-5">
                        <label for="username" class="block text-gray-700 text-sm mb-2 ml-1">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                   placeholder="Masukkan username"
                                   class="w-full pl-12 pr-4 py-3 rounded-lg bg-input-bg text-gray-700 focus:outline-none focus:ring-2 focus:ring-brown-btn/50 placeholder-gray-500/70 transition"
                                   required autofocus>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-8">
                        <label for="password" class="block text-gray-700 text-sm mb-2 ml-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password"
                                   placeholder="Masukkan password"
                                   class="w-full pl-12 pr-4 py-3 rounded-lg bg-input-bg text-gray-700 focus:outline-none focus:ring-2 focus:ring-brown-btn/50 placeholder-gray-500/70 transition"
                                   required>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-brown-btn hover:bg-brown-hover text-white font-medium py-3 rounded-xl shadow-lg transform active:scale-95 transition duration-200">
                        Login
                    </button>
                </form>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('admin.register') }}" class="text-brown-btn font-semibold hover:underline">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>