<footer class="border-t border-slate-800/60 bg-slate-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Brand --}}
            <div class="md:col-span-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="font-[Syne] font-700 text-lg text-white tracking-tight">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed max-w-xs">
                    Built with Laravel & Tailwind CSS. Fast, modern, and ready to scale.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="font-[Syne] font-600 text-sm text-white mb-4 uppercase tracking-wider">Navigation</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ url('/') }}" class="text-sm text-slate-400 hover:text-indigo-400 transition-colors">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-sm text-slate-400 hover:text-indigo-400 transition-colors">About</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-sm text-slate-400 hover:text-indigo-400 transition-colors">Contact</a></li>
                </ul>
            </div>

            {{-- Social / Extra --}}
            <div>
                <h4 class="font-[Syne] font-600 text-sm text-white mb-4 uppercase tracking-wider">Connect</h4>
                <ul class="space-y-2.5">
                    <li>
                        <a href="#" class="flex items-center gap-2 text-sm text-slate-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                            GitHub
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-sm text-slate-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            Twitter / X
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="mt-10 pt-6 border-t border-slate-800/60 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </p>
            <p class="text-xs text-slate-600">
                Built with <span class="text-indigo-400">Laravel</span> & <span class="text-indigo-400">Tailwind CSS</span>
            </p>
        </div>
    </div>
</footer>