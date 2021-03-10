<x-blog.app>
    <x-slot name="link">
        {{ asset("storage/images/blog-2.jpg") }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-5xl leading-tight after:empty-content inline-block">
            {{ __('Blog') }}
        </h2>
        <span class="text-white block text-2xl pt-0.5">
            Yoga & Privat
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Blog 
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
