<x-blog.app>
    <div class="max-w-7xl pt-5 mx-auto sm:px-6 lg:px-8">
        <div class="flex p-5">
            <p class="pr-5 text-gray-400 text-sm leading-6">{{ $gal->title }}</p>
            <div class="pr-5 w-5 h-5 mr-2 my-0.5 bg-yellow-550 rounded"></div>
            <a class="" href="{{ route('grid.gallery', $gal->id) }}">
                <img
                 class="w-5 opacity-40 my-0.5 hover:opacity-100 hover:bg-yellow-550 rounded"
                 src="{{ asset('storage/images/assets/grid.png') }}"
                 alt=""
                 />
            </a>
            <a class="ml-auto" href="{{ route('galleries') }}">
                <p class="ml-auto text-gray-400 text-sm leading-6">zurück zu galerien</p>
            </a>
        </div>
    </div>
    <div class="py-12" id="app">
        <container-gallery
            :prop-gallery="{{ $gal->galleryitems }}"
        ></container-gallery>
        <carousel-gallery
            :prop-gallery="{{ $gal->galleryitems }}"
        ></carousel-gallery>
    </div>
    <div class="py-12"></div>
</x-blog.app>
