<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Voteasy') }}</title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- SCRIPTS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="font-sans antialiased bg-slate-950 text-white overflow-x-hidden selection:bg-indigo-500 selection:text-white">

    <!-- BACKGROUND -->
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <!-- GRADIENT TOP -->
        <div
            class="absolute top-0 left-0 w-[500px] h-[500px] bg-indigo-600/20 rounded-full blur-3xl">
        </div>

        <!-- GRADIENT BOTTOM -->
        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-3xl">
        </div>

        <!-- CENTER GLOW -->
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-cyan-500/10 rounded-full blur-3xl">
        </div>

        <!-- GRID -->
        <div
            class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:40px_40px]">
        </div>

    </div>

    <div class="min-h-screen relative">

        <!-- NAVIGATION -->
        @include('layouts.navigation')

        <!-- PAGE HEADER -->
        @isset($header)

            <header
                class="sticky top-0 z-20 backdrop-blur-xl bg-slate-900/70 border-b border-white/10 shadow-2xl">

                <div
                    class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    <div
                        class="bg-white/5 border border-white/10 rounded-3xl px-6 py-5 shadow-2xl backdrop-blur-xl">

                        {{ $header }}

                    </div>

                </div>

            </header>

        @endisset

        <!-- MAIN CONTENT -->
        <main class="relative z-10">

            {{ $slot }}

        </main>

    </div>

</body>

</html>