<x-blog.app>
    <div class="py-12" id="app">
        <container-gallery
            :prop-gallery="{{ $gal->galleryItems }}"
        ></container-gallery>
        <carousel-gallery
            :prop-gallery="{{ $gal->galleryItems }}"
        ></carousel-gallery>
    </div>
    <div class="py-12">
    </div>
</x-blog.app>
