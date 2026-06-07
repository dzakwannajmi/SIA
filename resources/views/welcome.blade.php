@extends('layouts.app')

@section('title', 'Dashboard — ' . config('app.name'))
@section('description', 'Welcome to our application.')

@section('content')

    {{-- ===== HERO SECTION ===== --}}
    <section class="relative overflow-hidden">

        {{-- Background glow --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-indigo-500/10 rounded-full blur-3xl"></div>
            <div class="absolute top-20 right-0 w-64 h-64 bg-amber-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-20 text-center">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/25 text-indigo-400 text-xs font-medium mb-8 backdrop-blur-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                Laravel + Tailwind CSS v4
            </div>

            {{-- Heading --}}
            <h1 class="font-[Syne] font-800 text-4xl sm:text-5xl lg:text-7xl text-white leading-tight mb-6 tracking-tight">
                Build something
                <span class="relative inline-block">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-amber-400">
                        extraordinary
                    </span>
                </span>
            </h1>

            <p class="max-w-xl mx-auto text-slate-400 text-lg leading-relaxed mb-10">
                A clean, fast starting point with Laravel and Tailwind CSS. Dark-first, fully responsive, ready for production.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ Route::has('register') ? route('register') : '#' }}"
                   class="group px-6 py-3.5 bg-indigo-500 hover:bg-indigo-400 text-white font-semibold rounded-xl transition-all duration-200 shadow-xl shadow-indigo-500/30 hover:shadow-indigo-400/40 hover:-translate-y-0.5 flex items-center gap-2">
                    Get Started
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="#features"
                   class="px-6 py-3.5 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-medium rounded-xl transition-all duration-200 hover:bg-slate-800/50">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    {{-- ===== FEATURES SECTION ===== --}}
    <section id="features" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14">
                <h2 class="font-[Syne] font-700 text-3xl sm:text-4xl text-white mb-4">Everything you need</h2>
                <p class="text-slate-400 max-w-lg mx-auto">A solid foundation with the right tools already configured.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                @foreach ([
                    ['icon' => '⚡', 'title' => 'Lightning Fast', 'desc' => 'Vite-powered hot reload. Changes appear instantly in the browser.'],
                    ['icon' => '🎨', 'title' => 'Tailwind CSS v4', 'desc' => 'Utility-first CSS with the latest features and zero config.'],
                    ['icon' => '🔐', 'title' => 'Auth Ready', 'desc' => 'Laravel Breeze or Jetstream can be added in seconds.'],
                    ['icon' => '📱', 'title' => 'Responsive', 'desc' => 'Mobile-first design that looks great on every device.'],
                    ['icon' => '🌙', 'title' => 'Dark Mode', 'desc' => 'Beautiful dark theme baked in from the start.'],
                    ['icon' => '🚀', 'title' => 'Production Ready', 'desc' => 'Optimized assets, proper caching, ready to deploy.'],
                ] as $feature)
                    <div class="group p-6 bg-slate-900/50 hover:bg-slate-900 border border-slate-800/60 hover:border-indigo-500/30 rounded-2xl transition-all duration-300 hover:-translate-y-0.5">
                        <div class="text-2xl mb-4">{{ $feature['icon'] }}</div>
                        <h3 class="font-[Syne] font-600 text-white text-base mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ===== CTA SECTION ===== --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-indigo-600 to-indigo-800 p-10 sm:p-14 text-center">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_rgba(255,255,255,0.1),_transparent_60%)]"></div>
                <div class="relative">
                    <h2 class="font-[Syne] font-800 text-3xl sm:text-4xl text-white mb-4">Ready to build?</h2>
                    <p class="text-indigo-200 text-base mb-8 max-w-md mx-auto">Start with a solid foundation. Everything is set up and waiting for you.</p>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}"
                       class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-indigo-600 font-bold rounded-xl hover:bg-indigo-50 transition-all duration-200 shadow-xl">
                        Start Building
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection