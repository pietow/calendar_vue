<x-blog.app>
    <x-slot name="pos">
        {{ "bg-center" }}
    </x-slot>
    <x-slot name="link">
        {{ asset("storage/images/galerie.jpg") }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-5xl leading-tight after:empty-content inline-block">
            {{ __('Galerie') }}
        </h2>
        <span class="text-white block text-2xl pt-0.5">
            Yoga & Privat
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto mb-12 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($gals as $gal)
                            
                            <a href="{{ route('carousel.gallery', [$gal->id]) }}">
                                <div class="flex flex-col items-center">
                                    <img class="h-60 object-cover delay-150 duration-1000 ease-out hover:bg-blue-300 p-1 rounded-lg" src="{{ asset('storage/images/'.$gal->image) }}" alt="">
                                    <span class="block py-1.5 text-center text-gray-400 text-sm uppercase hover:text-blue-300"> {{$gal->title}} </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blog.app>
