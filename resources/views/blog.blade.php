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
            <div class="overflow-hidden">
                <div class="flex flex-col md:flex-row p-6"> 
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        @foreach ($posts as $post)
                        
                        <div class="bg-white" style="height:30rem;">
                            <a href="{{ route('article', $post->id) }}">
                                <img class="cursor-pointer h-1/2 object-cover object-top w-full" src='{{ asset("storage/images/".$post->image) }}'>
                            </a>
                            <div class="p-3 ">
                                {{-- F statt M schreibt den vollen Monatsnamen --}}
                                <div class="text-gray-400 tracking-wide uppercase text-xs">{{\Carbon\Carbon::parse($post->updated_at)->locale('de')->format('j. M, Y')}}</div> 
                                <a href="{{ route('article', $post->id) }}">
                                    <div class="text-xl font-title font-medium font-title capitalize hover:text-blue-400 cursor-pointer">{{ $post->title }}</div>
                                </a>
                                <div class="text-gray-600 text-justify pt-2 text-sm"> {{ substr($post->PostItems()->first()->description,0,450) }} 
                                    <a href="{{ route('article', $post->id) }}">
                                        <span class="text-blue-400 cursor-pointer hover:underline">
                                            mehr(...)
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div> 
                    <x-blog.aside :posts="$posts"/>
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
