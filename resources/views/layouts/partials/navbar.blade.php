<nav class="sticky top-0 z-40 w-full border-b border-slate-800/60 bg-slate-950/80 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                <div class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="font-[Syne] font-bold text-lg text-white tracking-tight">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ url('/') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200
                          {{ request()->is('/') ? 'text-indigo-400 bg-indigo-500/10' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800/60' }}">
                    Home
                </a>
                <a href="{{ url('/about') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200
                          {{ request()->is('about') ? 'text-indigo-400 bg-indigo-500/10' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800/60' }}">
                    About
                </a>
                <a href="{{ url('/contact') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200
                          {{ request()->is('contact') ? 'text-indigo-400 bg-indigo-500/10' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800/60' }}">
                    Contact
                </a>
            </div>

            {{-- Right Side: Auth Buttons --}}
            <div class="hidden md:flex items-center gap-3">
                @auth
                    {{-- User Dropdown (sudah login) --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center gap-2.5 px-3 py-1.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-all duration-200">
                            <div class="w-7 h-7 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center text-indigo-400 text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open }"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             @click.outside="open = false"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute right-0 mt-2 w-44 bg-slate-900 border border-slate-700/60 rounded-xl shadow-xl overflow-hidden">

                            @if (Route::has('dashboard'))
                                <a href="{{ route('dashboard') }}"
                                   class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                    </svg>
                                    Dashboard
                                </a>
                                <div class="border-t border-slate-700/60"></div>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Belum login --}}
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white transition-colors duration-200">
                            Log in
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-sm font-semibold bg-indigo-500 hover:bg-indigo-400 text-white rounded-lg transition-all duration-200 shadow-lg shadow-indigo-500/25 hover:shadow-indigo-400/30 hover:-translate-y-0.5">
                            Get Started
                        </a>
                    @endif
                @endauth
            </div>

            {{-- Mobile Menu Toggle --}}
            <button class="md:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 transition-colors"
                    x-data
                    @click="$dispatch('toggle-mobile-menu')">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="md:hidden border-t border-slate-800/60 bg-slate-950"
         x-data="{ open: false }"
         @toggle-mobile-menu.window="open = !open"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0">

        <div class="px-4 py-3 space-y-1">
            <a href="{{ url('/') }}"
               class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors">
                Home
            </a>
            <a href="{{ url('/about') }}"
               class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors">
                About
            </a>
            <a href="{{ url('/contact') }}"
               class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors">
                Contact
            </a>
        </div>

        <div class="px-4 pb-3 border-t border-slate-800/60 pt-3">
            @auth
                <div class="flex items-center gap-3 mb-3 px-1">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center text-indigo-400 text-sm font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                @if (Route::has('dashboard'))
                    <a href="{{ route('dashboard') }}"
                       class="block px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors mb-1">
                        Dashboard
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-3 py-2.5 rounded-lg text-sm font-medium text-red-400 hover:bg-red-500/10 transition-colors">
                        Log Out
                    </button>
                </form>
            @else
                <div class="flex gap-2">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                           class="flex-1 text-center px-4 py-2.5 text-sm font-medium text-slate-300 border border-slate-700 rounded-lg hover:bg-slate-800 transition-colors">
                            Log in
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="flex-1 text-center px-4 py-2.5 text-sm font-semibold bg-indigo-500 text-white rounded-lg hover:bg-indigo-400 transition-colors">
                            Get Started
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>