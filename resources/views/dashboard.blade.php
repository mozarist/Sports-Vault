<x-app-layout>

    <div class="max-w-7xl mx-auto w-full">
        <div class="bg-white dark:bg-gradient-to-tr from-zinc-950 to-zinc-900 overflow-hidden border border-zinc-800 rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __('Welcome back, ') }} {{ Auth::user()->name }}!
            </div>
        </div>
    </div>
</x-app-layout>
